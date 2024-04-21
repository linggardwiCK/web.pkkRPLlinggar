<?php
if ($_SESSION['user']['level'] != 'peminjam') {
    ?>
    <div class="container mt-5">

        <div class="row">



            <h1 class="mt-4 mt-10rem">kategori buku</h1>
            <div class="card">

                <div class="row">
                    <div class="col-md-12">
                        <a href="?page=buku_tambah" class="btn btn-primary " style="color:white;">+ tambah data</a>
                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>no</th>
                                <th>Nama Kategori</th>
                                <th>Judul</th>
                                <th>penulisa</th>
                                <th>penerbit</th>
                                <th>tahun terbit</th>
                                <th>deskripsi</th>
                                <th>foto</th>
                                <th>aksi</th>
                            </tr>
                            <?php
                            $i = 1;
                            $query = mysqli_query($koneksi, "SELECT*FROM buku LEFT JOIN kategori on buku.id_kategori = kategori.id_kategori");
                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $i++; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['kategori']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['judul']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['penulis']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['penerbit']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['tahun_terbit']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['deskripsi']; ?>
                                    </td>

                                    <td>
                                        <img src="assets/buku/<?php echo $data['foto'] ?>" alt="" width="100">
                                    </td>

                                    <td>
                                        <a href="?page=buku_ubah&&id=<?php echo $data['id_buku']; ?>"
                                            class="btn btn-info">ubah</a>
                                        <a onclick="return confirm('apakah anda yakin menghapus data ini');"
                                            href="?page=buku_hapus&&id=<?php echo $data['id_buku']; ?>"
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
    <?php
} ?>