<?php
$id = $_GET ["id"];
$query = mysqli_query($koneksi, "DELETE FROM kategori where id_kategori=$id")
?>
<script>
    alert('data berhasil terhapus')
    location.href = "index.php?page=kategori";
</script>