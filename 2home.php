<!-- Masthead-->
<header class="masthead" id="login">
    <div class="container">
        <div class="row gx-4 gx-lg-5 h-10 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">perpustakaan digital</h1>

            </div>

        </div>
    </div>
</header>
<!-- About-->
<section class="page-section bg-primary" id="buku">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0">We've got what you need!</h2>
                

            </div>
        </div>
    </div>
</section>





<div class="mt-5">

    
        <div class="row">

            <div class="row">
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * from buku LEFT JOIN kategori on buku.id_kategori = kategori.id_kategori");
                while ($data = mysqli_fetch_array($query)) {
                   
                    ?>

                    <div class="col-sm-3">
                        <?php $no++; ?>
                        <div class="container  card-p-2" style="min-width: 18rem;">

                            <img src="assets/buku/<?php echo $data['foto'] ?>" class="card-img-top" alt="..." width: 100%;>

                            <div class="card-body">
                                <p class="card-title h5 fw-lighter">
                                    <?php echo $data['kategori']; ?>
                                </p>
                                <h3 class="card-title h3 text-capitalize">
                                    <?php echo $data['judul']; ?>
                                </h3>
                                <p class="card-title p">penulis :
                                    <?php echo $data['penulis']; ?>
                                </p>
                                <p class="card-title p">Penerbit :
                                    <?php echo $data['penerbit']; ?>
                                </p>
                                <p class="card-title p">Tahun Terbit :
                                    <?php echo $data['tahun_terbit']; ?>
                                </p>
                                

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal<?php echo $no; ?>">
                                    Pinjam
                                </button>



                                


                            </div>
                        </div>
                    </div>
                     
                <?php } ?>
            </div>
        </div>
    </div>
</div>