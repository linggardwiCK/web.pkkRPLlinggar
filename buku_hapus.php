<?php
$id = $_GET ["id"];
$query = mysqli_query($koneksi, "DELETE FROM buku where id_buku=$id")
?>
<script>
    alert('data berhasil terhapus')
    location.href = "index.php?page=buku";
</script>