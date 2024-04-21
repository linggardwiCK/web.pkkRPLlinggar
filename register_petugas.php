<?php
if ($_SESSION['user']['level'] != 'peminjam') {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>register perpustakaan</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        if (isset ($_POST['register'])) {
                                            $name = $_POST['name'];
                                            $email = $_POST['email'];
                                            $no_telepon = $_POST['no_telepon'];
                                            $alamat = $_POST['alamat'];
                                            $username = $_POST['username'];
                                            $level = $_POST['level'];
                                            $password = md5($_POST['password']);

                                            $insert = mysqli_query($koneksi, "INSERT INTO user (name,email,alamat,no_telepon,username,password,level) VALUES ('$name','$email','$alamat','$no_telepon','$username','$password','2')");

                                            if ($insert) {
                                                echo '<script>alert("selat datang"); location.href="login.php"; </script>';
                                            } else {
                                                echo '<script>alert("terjadi kesalahan")  </script>';
                                            }
                                        }
                                        ?>
                                        <form method="post">
                                            <div class="form-floating mb-1">
                                                <input class="form-control" id="name" name="name" type="text"
                                                    placeholder="masukan nama lengkap" required />
                                                <label for="inputEmail" class="small mb-1">Nama Lengkap</label>
                                            </div>
                                            <div class="form-floating mb-1">
                                                <input class="form-control" id="email" name="email" type="email"
                                                    placeholder="masukan Email" required />
                                                <label for="inputEmail" class="small mb-1">Email</label>
                                            </div>
                                            <div class="form-floating mb-1">
                                                <input class="form-control" id="no_telepon" name="no_telepon" type="text"
                                                    placeholder="masukan No. Telepon" required />
                                                <label for="inputEmail" class="small mb-1">NO. Telepon</label>
                                            </div>
                                            <div class="form-grup">

                                                <label class="small mb-1">alamat</label>
                                                <textarea name="alamat" rows="5" class="form-control py-4"
                                                    required></textarea>
                                            </div>
                                            <div class="form-floating mb-1">
                                                <input class="form-control" id="username" name="username" type="username"
                                                    placeholder="username" required />
                                                <label for="inputEmail" class="small mb-1">Username</label>
                                            </div>

                                            <div class="form-floating mb-1">
                                                <input class="form-control" id="inputPassword" name="password"
                                                    type="password" placeholder="Password" required />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="register"
                                                    value="register">register</button>
                                                <a class="btn btn-danger" href="login.php">login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        &copy; 2024 ukk perpustakaan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>

    </html>
<?php } ?>