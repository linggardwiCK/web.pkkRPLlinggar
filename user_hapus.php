<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM ulasan
WHERE id_user = '$id'");
?>
<script>
    alert('Hapus Data Berhasil');
    location.href = "index.php?page=user";
</script>