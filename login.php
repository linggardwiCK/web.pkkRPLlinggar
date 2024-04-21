<?php
include "inc/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>login perpustakaan</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div style="background-color: rgba(107, 52, 35, 0.5); height: 100%">

        <video autoplay muted loop poster="poster.jpg"
            style="position: fixed; z-index: -1; width: 100%; height: 100%; object-fit: cover;">
            <source src="./assets/vidio/lobby.mp4" type="video/mp4">
            <!-- Tambahkan sumber video lainnya di sini jika diperlukan -->
        </video>
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
                                        if (isset($_POST['login'])) {
                                            $username = $_POST['username'];
                                            $password = md5($_POST['password']);

                                            $data = mysqli_query($koneksi, "SELECT*FROM user Where username ='$username' and password = '$password'");

                                            $cek = mysqli_num_rows($data);

                                            if ($cek > 0) {
                                                $_SESSION['user'] = mysqli_fetch_array($data);
                                                echo '<script>alert("selamat datang"); location.href="index.php"; </script>';
                                            } else {
                                                echo '<script>alert("terjadi kesalahan")  </script>';
                                            }
                                        }
                                        ?>
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" name="username"
                                                    type="username" placeholder="username" />
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="password"
                                                    type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary " type="submit "style="color:white;" name="login"
                                                    value="login">login</button>
                                                <a class="btn btn-danger" href="register.php">register</a>
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
    </div>
</body>

</html>