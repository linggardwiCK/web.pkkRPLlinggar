<?php

    
    include 'inc/koneksi.php';
    // Lanjutan kode Anda...

    if (isset ($_POST["query"])) {
        $search = $_POST["query"];
        $sql = "SELECT id_peminjam ,name,judul,tanggal_peminjaman,tanggal_pengembalian,status_peminjaman FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku WHERE name LIKE '%$search%'";
        $result = mysqli_query($koneksi, $sql);



        if (mysqli_num_rows($result) > 0) {
            ?>

            <div class="row container">
                <div class="col-sm-12">
                    <div class="">
                        <div class="row">
                            <table>
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Buku</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Status Peminjaman</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['status_peminjaman'] != 'dikembalikan' && $row['status_peminjaman'] != 'menunggu konfirmasi') {


                                            $name = $row['name'];
                                            $id_peminjam = $row['id_peminjam'];
                                            $judul = $row['judul'];
                                            $tanggal_peminjaman = $row['tanggal_peminjaman'];
                                            $tanggal_pengembalian = $row['tanggal_pengembalian'];
                                            $status_peminjaman = $row['status_peminjaman'];
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $name ?>
                                                </td>
                                                <td>
                                                    <?php echo $judul ?>
                                                </td>
                                                <td>
                                                    <?php echo $tanggal_peminjaman ?>
                                                </td>
                                                <td>
                                                    <?php echo $tanggal_pengembalian ?>
                                                </td>
                                                <td>
                                                    <?php echo $status_peminjaman ?>
                                                </td>
                                                <td>
                                                    <form method="post" action="?page=peminjaman_dikembalikan">
                                                        <input type="hidden" name="id_peminjam" value="<?php echo $id_peminjam ?>">
                                                        <button type="submit"
                                                            onclick="return confirm('Apakah anda yakin untuk mengubah status peminjaman buku menjadi dikembalikan?');"
                                                            class="btn btn-danger">kembali</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "<h6 class='text-danger text-center mt-3'>No data found</h6>";
        }
    }

?>