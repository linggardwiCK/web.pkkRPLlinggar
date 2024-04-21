<!-- Masthead-->
<header class="masthead" id="login">
    <div class="container">
        <div class="row gx-4 gx-lg-5 h-10 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">perpustakaan digital</h1>

            </div>

        </div>
    </div>
</header>
<!-- About-->
<section class="page-section bg-primary" id="buku">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0">We've got what you need!</h2>
                <h2>Live Data Search</h2>
                <input type="text" id="search" placeholder="Search by title...">
                <ul id="result"></ul>

                <!-- <script>
                    $(document).ready(function () {
                        $('#search').keyup(function () {
                            var query = $(this).val();
                            if (query != '') {
                                $.ajax({
                                    url: "search.php",
                                    method: "POST",
                                    data: { query: query },
                                    success: function (data) {
                                        $('#result').html(data);
                                    }
                                });
                            }else{
                                $("#searchresult").css("dispaly","none");
                            }
                        });
                    });
                </script> -->

            </div>
        </div>
    </div>
</section>




<div class="mt-5">

    <div class="container ">

        <div class="row">

            <div class="row">
                <?php

                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * from buku LEFT JOIN kategori on buku.id_kategori = kategori.id_kategori");
                while ($data = mysqli_fetch_array($query)) {
                    $isInCollection = false;

                    // Pastikan untuk melindungi variabel dari injeksi SQL dengan menggunakan fungsi mysqli_real_escape_string
                    $user_id = mysqli_real_escape_string($koneksi, $_SESSION['user']['id_user']);
                    $buku_id = mysqli_real_escape_string($koneksi, $data['id_buku']);

                    // Query dengan parameterized statement untuk mencegah serangan SQL Injection
                    $cekKoleksi = mysqli_prepare($koneksi, "SELECT * FROM koleksi WHERE id_user = ? AND id_buku = ?");
                    mysqli_stmt_bind_param($cekKoleksi, "ii", $user_id, $buku_id);
                    mysqli_stmt_execute($cekKoleksi);
                    $result = mysqli_stmt_get_result($cekKoleksi);

                    // Periksa apakah baris ditemukan
                    if (mysqli_num_rows($result) > 0) {
                        $isInCollection = true;
                        $koleksiData = mysqli_fetch_assoc($result);
                    }

                    // Selalu bersihkan hasil dan tutup statement setelah digunakan
                    mysqli_free_result($result);
                    mysqli_stmt_close($cekKoleksi);

                    ?>

                    <div class="col-sm-3">
                        <?php $no++; ?>
                        <div class="container  card-p-2" style="min-width: 18rem;">

                            <img src="assets/buku/<?php echo $data['foto'] ?>" class="card-img-top" alt="..." width: 100%;>

                            <div class="card-body">




                                <p class="card-title h5 fw-lighter">
                                    <?php echo $data['kategori']; ?>
                                </p>
                                <h3 class="card-title h3 text-capitalize">
                                    <?php echo $data['judul']; ?>
                                </h3>
                                <p class="card-title p">penulis :
                                    <?php echo $data['penulis']; ?>
                                </p>
                                <p class="card-title p">Penerbit :
                                    <?php echo $data['penerbit']; ?>
                                </p>
                                <p class="card-title p">Tahun Terbit :
                                    <?php echo $data['tahun_terbit']; ?>
                                </p>

                                <?php if ($isInCollection) { ?>
                                    <!-- Jika buku ada dalam koleksi, tampilkan tombol untuk menghapus dari koleksi -->
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus buku ini dari daftar koleksi anda?');"
                                        href="hapus_koleksi.php?id=<?php echo $koleksiData['id_koleksi']; ?>"
                                        class="btn btn-warning"><i class="fa-solid fa-bookmark"></i></a>
                                <?php } else { ?>
                                    <!-- Jika buku tidak ada dalam koleksi, tampilkan tombol untuk menambahkan ke koleksi -->
                                    <a onclick="return confirm('Apakah anda yakin ingin menambahkan buku ini kedalam daftar koleksi anda?');"
                                        href="tambah_koleksi.php?id=<?php echo $data['id_buku']; ?>&user=<?php echo $_SESSION['user']['id_user']; ?>"
                                        class="btn btn-warning"><i class="fa-regular fa-bookmark"></i></a>
                                <?php } ?>



                                <button type="button" class="btn btn-outline-secondary p" data-bs-toggle="modal"
                                    data-bs-target="#modaldesc<?php echo $no; ?>">
                                    deskripsi
                                </button>
                                <!-- modaldesc -->
                                <div class="modal fade" id="modaldesc<?php echo $no; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-3 card-title h3 text-capitalize"
                                                    id="exampleModalLabel">
                                                    <?php echo $data['judul']; ?>
                                                </h1>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body bg-light" style="height:800px;">
                                                <div class="row">
                                                    <div class="col-5" style="position:relative;"><img
                                                            src="assets/buku/<?php echo $data['foto'] ?>"
                                                            class="card-img-top" alt="..."
                                                            style="width:300px;height:400px;object-fit:cover;position:fixed">
                                                    </div>
                                                    <div class="col-7">
                                                        <h1 class="h1 fs-5">Deskripsi Buku</h1>
                                                        <div class="modal-dialog-scrollable">

                                                            <p class="p ">
                                                                <?php echo $data['deskripsi']; ?>
                                                            </p>
                                                        </div>
                                                        <div class="fixed">

                                                            <p class="card-title p pt-3 border-top">penulis :
                                                                <?php echo $data['penulis']; ?>
                                                            </p>
                                                            <p class="card-title p">Penerbit :
                                                                <?php echo $data['penerbit']; ?>
                                                            </p>
                                                            <p class="card-title p">Tahun Terbit :
                                                                <?php echo $data['tahun_terbit']; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal<?php echo $no; ?>">
                                    Pinjam
                                </button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#ulasan<?php echo $no; ?>">
                                    ulasan
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modal<?php echo $no; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 card-title h3 text-capitalize" id="exampleModalLabel">
                                        Pinjam Buku Ini?
                                    </h1>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body bg-light">
                                    <div class="row">
                                        <div class="col-5"><img src="assets/buku/<?php echo $data['foto'] ?>"
                                                class="card-img-top" alt="..."
                                                style="width:180px;height:300px;object-fit:cover;"></div>
                                        <div class="col-7">
                                            <form action="" method="POST">
                                                <h5 class="h5 fw-bold text-uppercase">
                                                    <?php echo $data['judul']; ?>
                                                </h5>
                                                <input type="hidden" name="id_buku" value="<?php echo $data['id_buku']; ?>">
                                                <label class="form-label fw-bold text-uppercase pt-4">Tanggal
                                                    Pinjam</label>
                                                <input type="date" class="form-control" name="tanggal_peminjaman"
                                                    min="<?php echo date('Y-m-d'); ?>" required>
                                                <label class="form-label fw-bold text-uppercase pt-4">Tanggal
                                                    Kembali</label>
                                                <input type="date" class="form-control" name="tanggal_pengembalian"
                                                    min="<?php echo date('Y-m-d'); ?>" required>
                                        </div>
                                        <i class="bi bi-1-circle"></i>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" name="pinjam" class="btn btn-primary">Ajukan
                                        Pinjaman</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    // include 'koneksi.php';
                    if (isset ($_POST['pinjam'])) {
                        $id_buku = $_POST['id_buku'];
                        $id_user = $_SESSION['user']['id_user'];
                        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                        $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                        $status_peminjaman = 'dipinjam';

                        $pinjam = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku,id_user,tanggal_peminjaman,tanggal_pengembalian,status_peminjaman) VALUES('$id_buku','$id_user','$tanggal_peminjaman','$tanggal_pengembalian','$status_peminjaman')");


                        if ($pinjam) {
                            echo "<script>
                            alert('data berhasil ditambahkan');
                            window.location='index.php?page=home';
                            </script>";
                        }
                    }
                    ?>
                    ulasn
                    <div class="modal fade" id="ulasan<?php echo $no; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-3 card-title h3 text-capitalize" id="exampleModalLabel">
                                        <?php echo $data['judul']; ?>
                                    </h1>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body bg-light" style="height:800px;">
                                    <div class="row">
                                        <div class="col-5" style="position:relative;"><img
                                                src="assets/buku/<?php echo $data['foto'] ?>" class="card-img-top" alt="..."
                                                style="width:300px;height:400px;object-fit:cover;position:fixed">
                                        </div>
                                        <div class="col-7">
                                            <h1 class="h1 fs-5">Deskripsi Buku</h1>
                                            <div class="modal-dialog-scrollable">
                                                <tr>

                                                    <th>ulasan</th>

                                                </tr>
                                                <?php $query = mysqli_query($koneksi, "SELECT*FROM ulasan LEFT JOIN user on user.id_user = ulasan.id_user LEFT JOIN buku on buku.id_buku = ulasan.id_buku");
                                                while ($data = mysqli_fetch_array($query)) { ?>
                                                    <?php echo $data['ulasan']; ?>
                                                    <?php
                                                }
                                                ?>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>