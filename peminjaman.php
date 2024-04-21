<?php
if ($_SESSION['user']['level'] != 'peminjam') {
  ?>
  <div class="container mt-5">
    <div class="container">
      <div class="row">
        <div class="container ">
          <div class="container ">
            <h1 class="mt-4">Laporan Peminjaman Buku</h1>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <a href="?page=peminjaman_tambah" class="btn btn-primary"style="color:white;"> <i class="fa fa-plus"style="color:white;"></i> Tambah Peminjaman</a>
                    <a href="?page=peminjaman_dipinjam" class="btn btn-primary"style="color:white;"> <i class="fa-solid fa-book"style="color:white;"></i> buku dipinjam</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Aksi</th>


                      </tr>
                      <?php
                      $i = 1;
                      $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku ORDER BY peminjaman.id_peminjam DESC");
                      while ($data = mysqli_fetch_array($query)) {
                        if ($data['status_peminjaman'] != 'dikembalikan') {
                          ?>
                          <tr>
                            <td>
                              <?php echo $i++; ?>
                            </td>
                            <td>
                              <?php echo $data['name']; ?>
                            </td>
                            <td>
                              <?php echo $data['judul']; ?>
                            </td>
                            <td>
                              <?php echo $data['tanggal_peminjaman']; ?>
                            </td>
                            <td>
                              <?php echo $data['tanggal_pengembalian']; ?>
                            </td>
                            <td>
                              <?php echo $data['status_peminjaman']; ?>
                            </td>
                            <td>
                              <?php
                              if ($data['status_peminjaman'] != 'dikembalikan') {
                                ?>
                                <a href="?page=peminjaman_konfirmasi&&id=<?php echo $data['id_peminjam']; ?>"
                                  class="btn btn-info">Ubah</a>
                                <a onclick="return confirm('Apakah anda yakin untuk menghapus data ini?');"
                                  href="?page=peminjaman_hapus&&id=<?php echo $data['id_peminjam']; ?>"
                                  class="btn btn-danger">Hapus</a>
                                <?php
                              }
                              ?>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      ?>
                    </table>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>