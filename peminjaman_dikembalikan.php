<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["id_peminjam"])) {
        $id_peminjam = $_POST["id_peminjam"];

        // Lakukan pembaruan status peminjaman buku menjadi "dikembalikan"
        $sql_update = "UPDATE peminjaman SET status_peminjaman = 'dikembalikan' WHERE id_peminjam = $id_peminjam";
        $result_update = mysqli_query($koneksi, $sql_update);

        if($result_update) {
            // Redirect ke halaman sebelumnya atau ke halaman lain jika diperlukan
            header("Location: index.php?page=peminjaman_dipinjam");
            exit;
        } else {
            // Jika gagal melakukan pembaruan, tampilkan pesan kesalahan
            echo "Gagal mengubah status peminjaman buku.";
        }
    } else {
        // Jika tidak ada ID peminjam yang diterima, tampilkan pesan kesalahan
        echo "ID peminjam tidak ditemukan.";
    }
} else {
    // Jika tidak ada permintaan POST, redirect ke halaman lain atau lakukan tindakan lain jika diperlukan
    header("Location: index.php?page=peminjaman_dipinjam");
    exit;
}
?>
