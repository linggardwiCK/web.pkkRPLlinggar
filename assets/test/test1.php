<div class="container-fluid p-4">
      <h1 class="text-center fs-2">Rekomendasi Buku</h1>
      <!-- card -->
      <div class="row">
        <?php
    $no = 1;
    $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori ON buku.kategori_id = kategori.kategori_id ORDER BY RAND() LIMIT 4");
    while ($data = mysqli_fetch_array($query)) {
        $isInCollection = false;
        // Periksa apakah buku saat ini ada dalam koleksi pengguna
        $cekKoleksi = mysqli_query($koneksi, "SELECT * FROM koleksi WHERE user_id = $_SESSION[user_id] AND buku_id = $data[buku_id]");
        if (mysqli_num_rows($cekKoleksi) > 0) {
            $isInCollection = true;
            $koleksiData = mysqli_fetch_assoc($cekKoleksi);
        }
        ?>

          <div class="col-sm-3">
            <?php $no++; ?>
            <div class="card shadow" style="min-width: 18rem;min-height:25rem;">
              <div class="card-body">
                <div class="row border-bottom pb-2">
                  <div class="col-6"><img src="../db/<?php echo $data['foto'] ?>" class="card-img-top" alt="..." style="width:140px;height:200px;object-fit:cover;"></div>
                  <div class="col-6 ">
                    <p class="card-title h5 fw-lighter">
                      <?php echo $data['kategori_nama']; ?>
                    </p>
                    <h5 class="card-title h5 text-capitalize pt-2">
                      <?php echo $data['judul']; ?>
                    </h5>
                    <button type="button" class="btn btn-outline-secondary p" data-bs-toggle="modal" data-bs-target="#modaldesc<?php echo $no; ?>">
                      Lihat
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modaldesc<?php echo $no; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-3 card-title h3 text-capitalize" id="exampleModalLabel">
                              <?php echo $data['judul']; ?>
                            </h1>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body bg-light">
                            <div class="row">
                              <div class="col-5" style="position:relative;"><img src="../db/<?php echo $data['foto'] ?>" class="card-img-top" alt="..." style="width:300px;height:400px;object-fit:cover;position:fixed"></div>
                              <div class="col-7">
                                <h1 class="h1 fs-5">Deskripsi Buku</h1>
                                <p class="p"><?php echo $data['deskripsi']; ?></p>
                                <p class="card-title p pt-3 border-top">penulis :
                                  <?php echo $data['penulis']; ?>
                                </p>
                                <p class="card-title p">Penerbit :
                                  <?php echo $data['penerbit']; ?>
                                </p>
                                <p class="card-title p">Tahun Terbit :
                                  <?php echo $data['tanggal_terbit']; ?>
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button class="btn btn-primary" data-bs-target="#modal<?php echo $no; ?>" data-bs-toggle="modal" data-bs-dismiss="modal">Pinjam Buku Ini</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <p class="card-title p">penulis :
                  <?php echo $data['penulis']; ?>
                </p>
                <p class="card-title p">Penerbit :
                  <?php echo $data['penerbit']; ?>
                </p>
                <p class="card-title p">Tahun Terbit :
                  <?php echo $data['tanggal_terbit']; ?>
                </p>
                <?php if ($isInCollection) { ?>
                  <!-- Jika buku ada dalam koleksi, tampilkan tombol untuk menghapus dari koleksi -->
                  <a onclick="return confirm('Apakah anda yakin ingin menghapus buku ini dari daftar koleksi anda?');" href="hapus_koleksi.php?id=<?php echo $koleksiData['koleksi_id']; ?>" class="btn btn-warning"><i class="fa-solid fa-bookmark"></i></a>
                <?php } else { ?>
                  <!-- Jika buku tidak ada dalam koleksi, tampilkan tombol untuk menambahkan ke koleksi -->
                  <a onclick="return confirm('Apakah anda yakin ingin menambahkan buku ini kedalam daftar koleksi anda?');" href="tambah_koleksi.php?id=<?php echo $data['buku_id']; ?>&user=<?php echo $_SESSION['user_id']; ?>" class="btn btn-warning"><i class="fa-regular fa-bookmark"></i></a>
                <?php } ?>


                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?php echo $no; ?>">
                  Pinjam
                </button>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="modal<?php echo $no; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5 card-title h3 text-capitalize" id="exampleModalLabel">
                    Pinjam Buku Ini?
                  </h1>

                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                  <div class="row">
                    <div class="col-5"><img src="../db/<?php echo $data['foto'] ?>" class="card-img-top" alt="..." style="width:180px;height:300px;object-fit:cover;"></div>
                    <div class="col-7">
                      <form action="" method="POST">
                        <h5 class="h5 fw-bold text-uppercase"><?php echo $data['judul']; ?></h5>
                        <input type="hidden" name="buku_id" value="<?php echo $data['buku_id']; ?>">
                        <label class="form-label fw-bold text-uppercase pt-4">Tanggal Pinjam</label>
                        <input class="form-control" type="date" name="tanggal_pinjam" id="" min="<?php echo date('Y-m-d'); ?>" required>
                        <label class="form-label fw-bold text-uppercase pt-4">Tanggal Kembali</label>
                        <input class="form-control" type="date" name="tanggal_kembali" id="" min="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                  </div>
                </div>
                <div class="modal-footer d-flex align-items-end justify-content-between">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" name="pinjam" class="btn btn-primary">Ajukan Pinjaman</button></form>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <?php
    if (isset($_POST['pinjam'])) {
      $user_id = $_SESSION['user_id'];
      $buku_id = $_POST['buku_id'];
      $tanggal_pinjam = $_POST['tanggal_pinjam'];
      $tanggal_kembali = $_POST['tanggal_kembali'];
      $status = 'dipinjam';

      $pinjam = mysqli_query($koneksi, "INSERT INTO peminjaman VALUES ('','$user_id','$buku_id','$tanggal_pinjam','$tanggal_kembali','$status')");
      if ($pinjam) {
        echo "<script>
                            alert('data berhasil ditambahkan');
                            window.location='index.php?page=pinjaman';
                            </script>";
      }
    }
    ?>
    <!-- card -->