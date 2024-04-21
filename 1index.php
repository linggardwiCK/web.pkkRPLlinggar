<?php
include "inc/koneksi.php";
if (!isset ($_SESSION['user'])) {
    header('location:menu.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>perpustakaan </title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/1styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/scroll.css">
    <link rel="stylesheet" href="css/cart.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed" style="background-color: rgb(255, 255, 255   )">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5 ">
            <a class="navbar-brand" href="?page=home">Start Bootstrap</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse " id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <?php
                    if ($_SESSION['user']['level'] != 'peminjam') {
                        ?>
                        <li class="nav-item"><a class="nav-link" href="?page=kategori">kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="?page=laporan">laporan</a></li>
                        <li class="nav-item"><a class="nav-link" href="?page=buku">buku</a></li>
                        <li class="nav-item"><a class="nav-link" href="?page=peminjaman">pinjaman</a></li>
                        <?php
                        if ($_SESSION['user']['level'] != 'peminjam' && $_SESSION['user']['level'] != 'petugas') {

                            ?>
                            <li class="nav-item"><a class="nav-link" href="?page=user">user</a></li>
                            <?php
                        }
                        ?>
                        <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['user']['level'] != 'admin' && $_SESSION['user']['level'] != 'petugas') {

                        ?>
                        <li class="nav-item"><a class="nav-link" href="?page=peminjaman1">pinjaman</a></li>
                        <?php
                    }
                    ?>
                    <li class="nav-item"><a class="nav-link" href="?page=ulasan">ulasan</a></li>
                    <li class="nav-item"><a class="nav-link" href="?page=cari">cari</a></li>
                    <form class="d-flex" onsubmit="return searchPage()">
                        <input type="text" id="indexSearch" class="form-control" autocomplete="off"
                            placeholder="Search by title...">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    <script>
                        function searchPage() {
                            var searchQuery = document.getElementById("indexSearch").value;
                            window.location.href = "cari.php?page=cari&query=" + encodeURIComponent(searchQuery);
                            return false;
                        }
                    </script>


                    <li class="nav-item"><a class="nav-link" href="?page=koleksi">koleksi</a></li>
                    <li class="nav-item"><a class="nav-link" onclick="return confirm('apa anda yakin ingin logout');"
                            href="logout.php">Logout</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">

            <div id="layoutSidenav_content">
                <main>
                    <div>
                        <?php
                        $page = isset ($_GET['page']) ? $_GET['page'] : 'home';
                        if (file_exists($page . '.php')) {
                            include $page . '.php';
                        } else {
                            include '404.php';
                        }
                        ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto fixed-bottom ">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>

                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
            crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
            crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>

</html>