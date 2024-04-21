<div class="container mt-5">

    <div class="row">

        <h1 class="mt-4">ulasan</h1>
        <div class="card">

            <div class="row">
                <div class="col-md-12">
                    <a href="?page=ulasan_tambah" class="btn btn-primary"style="color:white;">+ tambah data</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>no</th>
                            <th>user</th>
                            <th>buku</th>
                            <th>ulasan</th>
                            <th>Rating</th>
                            <th>aksi</th>
                        </tr>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT*FROM ulasan LEFT JOIN user on user.id_user = ulasan.id_user LEFT JOIN buku on buku.id_buku = ulasan.id_buku");
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
                                    <?php echo $data['ulasan']; ?>
                                </td>
                                <td>
                                    <?php echo $data['rating']; ?>
                                </td>

                                <td>
                                    <a href="?page=ulasan_ubah&&id=<?php echo $data['id_ulasan']; ?>"
                                        class="btn btn-info">ubah</a>
                                    <a onclick="return confirm('apakah anda yakin menghapus data ini');"
                                        href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>"
                                        class="btn btn-danger">hapus</a>
                                </td>
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