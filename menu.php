<?php
include 'inc/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Arsip Hikayat Lumina</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet">
    <link href="css/menu_styles.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/img/icon.png">
    <link rel="stylesheet" href="css/scroll.css">
    <link rel="stylesheet" href="css/menu_cart.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Arsip Hikayat Lumina</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="#buku">Buku</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav"></div>
        <div id="layoutSidenav_content">
            <main>
                <!-- Masthead-->
                <header class="masthead" id="login">
                    <div class="container px-4 px-lg-5 h-100">
                        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                            <div class="col-lg-8 align-self-end">
                                <h1 class="text-white font-weight-bold">Selamat datang di Perpustakaan!</h1>
                                <hr class="divider" />
                            </div>
                            <div class="col-lg-8 align-self-baseline">
                                <p class="text-white-75 mb-5"> Temukan beragam koleksi literatur kami, pinjam buku
                                    favorit Anda, dan nikmati pengalaman membaca yang memikat dengan sistem pencarian
                                    yang mudah di situs web kami.</p>
                                <a class="btn btn-primary btn-xl" href="login.php" style="color:white;"><i
                                        class="fa-solid fa-arrow-right-to-bracket" style="color:white;"></i>
                                    Login</a>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- About-->
                <section class="page-section bg-primary" id="buku">
                    <div class="container px-4 px-lg-5">
                        <div class="row gx-1 gx-lg- justify-content-center">
                            <div class="col-lg-8 text-center">
                                <h2 class="text-white mt-0">Berkumpul di Antara Halaman</h2>
                                <hr class="divider divider-light" />
                                <p class="text-white-75 mb-0">"Telusuri peradaban yang luas, sambut kebijaksanaan yang
                                    tak terbatas di setiap lembaran halaman-halaman buku yang tersaji. Dari
                                    cerita-cerita
                                    masa lalu yang memesona hingga visi masa depan yang menggetarkan, setiap lembar
                                    adalah
                                    petualangan menyusuri jalur pemikiran manusia, menyingkap kebenaran yang tersembunyi
                                    dan menerangi yang mencarinya."</p>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="container mt-3">
                    <div class="row container-center">
                        <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * from buku LEFT JOIN kategori on buku.id_kategori = kategori.id_kategori ORDER BY RAND()");
                        while ($data = mysqli_fetch_array($query)) { ?>
                            <div class="col-sm-3">
                                <?php $no++; ?>
                                <div class="container card-p-2" style="min-width: 18rem; border: 1.9px solid #ccc;" type="button" class="btn btn-outline-secondary p" data-bs-toggle="modal"
                                data-bs-target="#modaldesc<?php echo $no; ?>">
                                    <p class="card-title h5 text-capitalize scroll-text row justify-content-center">
                                        <?php echo $data['kategori']; ?>
                                    </p>
                                    <img src="assets/buku/<?php echo $data['foto'] ?>" class="card-img-top" alt="..."
                                        style="width:100%;">
                                    <div class="card-body">
                                        <h3 class="card-title h3 text-capitalize scroll-text">
                                            <?php echo $data['judul']; ?>
                                        </h3>
                                        <p class="card-title p scroll-text">Penulis :
                                            <?php echo $data['penulis']; ?>
                                        </p>
                                        <p class="card-title p scroll-text">Penerbit :
                                            <?php echo $data['penerbit']; ?>
                                        </p>
                                        <p class="card-title p scroll-text">Tahun Terbit :
                                            <?php echo $data['tahun_terbit']; ?>
                                        </p>
                                        <!-- modaldesc -->
                                        <div class="modal fade" id="modaldesc<?php echo $no; ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-3 card-title h3 text-capitalize"
                                                            id="exampleModalLabel">
                                                            <?php echo $data['judul']; ?>
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body bg-light" style="height:800px;">
                                                        <div class="row">
                                                            <div class="col-5" style="position:relative;">
                                                                <img src="assets/buku/<?php echo $data['foto'] ?>"
                                                                    class="card-img-top" alt="..."
                                                                    style="width:300px;height:400px;object-fit:cover;position:fixed">
                                                            </div>
                                                            <div class="col-7">
                                                                <h1 class="h1 fs-5">Deskripsi Buku</h1>
                                                                <div class="modal-dialog-scrollable">
                                                                    <p class="p">
                                                                        <?php echo $data['deskripsi']; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="fixed">
                                                                    <p class="card-title p pt-3 border-top">Penulis :
                                                                        <?php echo $data['penulis']; ?>
                                                                    </p>
                                                                    <p class="card-title p">Penerbit :
                                                                        <?php echo $data['penerbit']; ?>
                                                                    </p>
                                                                    <p class="card-title p">Tahun Terbit :
                                                                        <?php echo $data['tahun_terbit']; ?>
                                                                    </p>
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
                        <?php } ?>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>