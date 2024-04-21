<?php
if ($_SESSION['user']['level'] != 'peminjam') {
  ?>
<h2 align="center">laporan peminjaman buku</h2>
<table class="table table-bordered" border="1" id="dataTable" width="100%" cellspacing="0">
    <tr>
        <th>no</th>
        <th>user</th>
        <th>buku</th>
        <th>tanggal peminjaman</th>
        <th>tanggal pengembalian</th>
        <th>status peminjaman</th>

    </tr>
    <?php
    include "inc/koneksi.php";
    $i = 1;
    $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku");
    while ($data = mysqli_fetch_array($query)) {
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



        </tr>
        <?php
    }
    ?>
</table>
<script>
    window.print();
    setTimeout(function(){
        window.close();
    }, 100);
</script>
<?php
}?>