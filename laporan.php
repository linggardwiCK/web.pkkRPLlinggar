<?php
if ($_SESSION['user']['level'] != 'peminjam') {
  ?>
<div class="container mt-5">

    <div class="row">
        <h1 class="mt-4 ">laporan</h1>
        <div class="card">

            <div class="row">
                <div class="col-md-12">
                    <a href="cetak.php" targrt="_blank" class="btn btn-primary " style="color:white;"><i class="fa fa-print "></i>+ cetak data</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>no</th>
                            <th>user</th>
                            <th>buku</th>
                            <th>tanggal peminjaman</th>
                            <th>tanggal pengembalian</th>
                            <th>status peminjaman</th>
                        
                        </tr>
                        <?php
                        $i = 1;
                            $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku");
                            while($data = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $i++;  ?></td>
                                    <td><?php echo $data ['name']; ?></td>
                                    <td><?php echo $data ['judul']; ?></td>
                                    <td><?php echo $data ['tanggal_peminjaman']; ?></td>
                                    <td><?php echo $data ['tanggal_pengembalian']; ?></td>
                                    <td><?php echo $data ['status_peminjaman']; ?></td>
                                    
                                
                                
                                </tr>
                                <?php
                            }                                                                  
                        ?>
                    </table>
                </div>
            </div>
        </div>                                                                                                                         
    </div>                                                                                                                         
</div>  
<?php
}?>                                                                                                                       