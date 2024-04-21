<?php
if ($_SESSION['user']['level'] != 'peminjam') {
  ?>
<div class="container mt-5">
    <div class="container">
        <div class="row">
            <div class="container ">
                <div class="container">

                    <h1 class="mt-4">kategori buku</h1>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post">
                                        <?php
                                        if (isset ($_POST['submit'])) {

                                            $kategori = $_POST['kategori'];
                                            $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) values ('$kategori')");

                                            if ($query) {
                                                echo '<script>alert("data berhasil tersimpan");  </script>';
                                            } else {
                                                echo '<script>alert("data gagal");  </script>';
                                            }
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-2">Nama kategori</div>
                                            <div class="col-md-8"><input type="text" class="form-control"
                                                    name="kategori"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <button type="submit" class="btn btn-primary" name="submit"
                                                    value="submit">simpan</button>
                                                <button type="reset" class="btn btn-secondary">Reset</button>
                                                <a href="?page=kategori" class="btn btn-danger">kembali</a>
                                            </div>
                                        </div>
                                    </form>
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
} ?>