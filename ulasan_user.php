<div class="container ">
    <div class="mt-5">
        <div class="container-fluid px-4 mt-4">
            <h1 class="mt-4 text-center"> Ulasan Anda</h1>
            <p class="breadcrumb-item text-center active"><a href="?page=ulasan_tambah" class="btn btn-primary "
                    style="color:white;">ulas cepat</a>
            </p>
            <div class="row justify-content-center">
                <?php
                $no = 1;
                $sesi = $_SESSION['user']['id_user'];
                $search = ''; // definisikan $search
                
                $query = mysqli_query($koneksi, "SELECT ulasan.id_ulasan, ulasan.id_user, ulasan.id_buku, ulasan, foto, penulis, rating, judul, user.name, kategori.kategori 
        FROM ulasan 
        LEFT JOIN user ON user.id_user = ulasan.id_user 
        LEFT JOIN buku ON buku.id_buku = ulasan.id_buku 
        LEFT JOIN kategori on buku.id_kategori = kategori.id_kategori
        WHERE judul LIKE '%$search%' AND ulasan.id_user = $sesi");
                while ($data = mysqli_fetch_array($query)) {
                    ?>

                    <div class="col-sm-6">
                        <?php $no++; ?>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-4">
                                        <img src="assets/buku/<?php echo $data['foto'] ?>" class="card-img-top" alt="..."
                                            style="height:300px;object-fit:cover;">
                                    </div>
                                    <div class="col-8 ">
                                        <p class="card-title  p pt-2 fw-lighter text-capitalize">
                                            <?php echo $data['kategori']; ?>
                                            <?php echo $data['penulis']; ?>
                                        </p>
                                        <h5 class="card-title h4 text-capitalize fs-3"
                                            style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;text-overflow:ellipsis">
                                            <?php echo $data['judul']; ?>
                                        </h5>
                                        <p class="p fw-light fs-6" style="margin-bottom:-2px;"><span
                                                class=" fs-5 fw-normal">
                                                Ulasan
                                                Anda </span>
                                            <?php

                                            ?>

                                        </p>
                                        <?php
                                        $rating = $data['rating'];
                                        $bintang_penuh = floor($rating / 2);

                                        // Hitung apakah ada bintang setengah
                                        $bintang_setengah = ($rating % 2 == 1) ? 1 : 0;

                                        // Hitung jumlah bintang kosong
                                        $bintang_kosong = 5 - $bintang_penuh - $bintang_setengah;


                                        for ($i = 0; $i < $bintang_penuh; $i++) {
                                            echo '<i class="fa-solid fa-star"></i>'; // Icon bintang penuh
                                        }
                                        if ($bintang_setengah) {
                                            echo '<i class="fa-regular fa-star-half-stroke"></i>'; // Icon setengah bintang
                                        }
                                        for ($i = 0; $i < $bintang_kosong; $i++) {
                                            echo '<i class="fa-regular fa-star"></i>'; // Icon bintang kosong
                                        }
                                        ?>
                                        <?php echo $data['rating']; ?>/10
                                        <div class="col-12 rounded border border-secondary my-2 px-2">
                                            <p class="p">
                                                <?php echo $data['ulasan']; ?>
                                            </p>
                                        </div>
                                        <a onclick="return confirm('edit ulasan ini?');"
                                            href="?page=ulasan_ubah&&id=<?php echo $data['id_ulasan']; ?>"
                                            class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                                        <a onclick="return confirm('hapus ulasan ini?');"
                                            href="../config/hapus.php?location=peminjam&&page=ulasan&&jenis=ulasan&&jenis_id=ulasan_id&&&&id=<?php echo $data['id_ulasan']; ?>"
                                            class="btn btn-danger"><i class="fa-solid fa-trash"></i> hapus</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>