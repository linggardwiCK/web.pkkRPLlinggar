<?php
if ($_SESSION['user']['level'] != 'peminjam') {
  ?>
<div class="container mt-5">
    <div class="container">
        <div class="row">
            <div class="container ">
                <div class="container ">
                    <div class="container margin-bottom: 100px;">
                        <h1 class="mt-4"> buku</h1>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-2"> ulasan buku</div>
                                                <div class="col-md-8">
                                                    <select name="id_kategori" class="form-control">
                                                        <?php
                                                        $kat = mysqli_query($koneksi, "SELECT*FROM kategori");
                                                        while ($kategori = mysqli_fetch_array($kat)) {
                                                            ?>
                                                            <option value="<?php echo $kategori['id_kategori']; ?>">
                                                                <?php echo $kategori['kategori']; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-2">Judul</div>
                                                <div class="col-md-8"><input type="text" class="form-control"
                                                        name="judul"></div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-2">Penulis</div>
                                                <div class="col-md-8"><input type="text" class="form-control"
                                                        name="penulis"></div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-2">Penerbit</div>
                                                <div class="col-md-8"><input type="text" class="form-control"
                                                        name="penerbit"></div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-2">Tahun Terbit</div>
                                                <div class="col-md-8"><input type="number" class="form-control"
                                                        name="tahun_terbit"></div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-2">Deskripsi</div>
                                                <div class="col-md-8">
                                                    <textarea name="deskripsi" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold text-uppercase">Foto sampul</label>
                                                <input type="file" class="form-control" name="foto" required>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-primary" name="submit"
                                                        value="submit">simpan</button>
                                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                                    <a href="?page=buku" class="btn btn-danger">kembali</a>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        if (isset ($_POST['submit'])) {
                                            mysqli_error($koneksi);
                                            $id_kategori = $_POST['id_kategori'];
                                            $judul = $_POST['judul'];
                                            $penulis = $_POST['penulis'];
                                            $penerbit = $_POST['penerbit'];
                                            $tahun_terbit = $_POST['tahun_terbit'];
                                            $deskripsi = $_POST['deskripsi'];

                                            $foto = $_FILES['foto']['name'];
                                            $tmp = $_FILES['foto']['tmp_name'];

                                            $lokasi = 'assets/buku/';
                                            $nama_foto = rand(0, 999) . '-' . $foto;

                                            move_uploaded_file($tmp, $lokasi . $nama_foto);

                                            $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori,judul,penulis,penerbit,tahun_terbit,deskripsi,foto) values('$id_kategori','$judul','$penulis','$penerbit','$tahun_terbit','$deskripsi','$nama_foto')");

                                            if ($query) {
                                                echo '<script>alert("data berhasil tersimpan");  </script>';
                                            } else {
                                                echo '<script>alert("data gagal");  </script>';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}?>