<?php
// include 'inc/koneksi.php'; // Hubungkan ke database



$id_buku = $_GET["id"];

// Query untuk mengambil judul buku berdasarkan id
$query_judul = mysqli_query($koneksi, "SELECT judul FROM buku WHERE id_buku = $id_buku");
$data_judul = mysqli_fetch_assoc($query_judul);
$judul_buku = $data_judul['judul'];

if (isset($_POST['submit'])) {
    $id_user = $_SESSION['user']['id_user'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $status_peminjaman = '3';

    // Perbaiki query INSERT INTO peminjaman, sesuaikan dengan struktur tabel di database
    $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku,id_user,tanggal_peminjaman,tanggal_pengembalian,status_peminjaman) VALUES('$id_buku','$id_user','$tanggal_peminjaman','$tanggal_pengembalian','3')");

    if ($query) {
        echo '<script>alert("Tambah Data Berhasil.");</script>';
    } else {
        echo '<script>alert("Tambah Data Gagal.");</script>';
    }
}
?>

<div class="container mt-5">
    <div class="container">
        <div class="row">
            <div class="container ">
                <div class="container ">
                    <h1 class="mt-4"><?php echo $judul_buku; ?></h1> <!-- Menampilkan judul buku -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post">

                                        <input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>"> <!-- Menambahkan input hidden untuk menyimpan id buku -->

                                        <div class="row mb-3">
                                            <div class="col-md-2">Tanggal Peminjaman</div>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control" name="tanggal_peminjaman"
                                                    min="<?php echo date('Y-m-d'); ?>" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-2">Tanggal Pengembalian</div>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control" name="tanggal_pengembalian"
                                                    min="<?php echo date('Y-m-d'); ?>" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <button type="submit" class="btn btn-primary" name="submit"
                                                    value="submit">Simpan</button>
                                                <button type="reset" class="btn btn-secondary">Reset</button>
                                                <a href="?page=peminjaman1" class="btn btn-danger">Kembali</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
