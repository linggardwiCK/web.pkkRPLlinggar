<?php
$id = $_GET ["id"];
$query = mysqli_query($koneksi, "DELETE FROM peminjaman where id_peminjam=$id")
?>
<script>
    alert('data berhasil terhapus')
    location.href = "index.php?page=peminjaman1";
</script>