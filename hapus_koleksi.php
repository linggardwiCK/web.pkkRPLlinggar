<?php
include 'inc/koneksi.php';
$id=$_GET['id'];
$query=mysqli_query($koneksi, "DELETE FROM koleksi where id_koleksi='$id'");
?>
<script>alert('berhasil');
location.href = "index.php";</script>