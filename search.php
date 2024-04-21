<?php
include 'inc/koneksi.php';

if (isset($_POST["query"])) {
    $search = $_POST["query"];
    $sql = "SELECT buku.id_buku, judul, penulis, foto, kategori, penerbit, tahun_terbit, deskripsi 
        FROM buku 
        LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori 
        WHERE judul LIKE '%$search%'";

    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $no = 1; // Initialize the variable $no
?>

<div class="row">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="col-sm-3">
            <!-- Add "border" class to book container -->
            <div class="container card-p-2 " style="min-width: 18rem"> <!-- Adjust margin values as needed -->
                <p class="card-title h5 text-capitalize scroll-text row justify-content-center">
                    <?php echo htmlspecialchars($row['kategori']); ?>
                </p>
                <!-- Add some margin to the bottom of each card -->
                <img type="button" class="btn btn-outline-secondary p" data-bs-toggle="modal" data-bs-target="#modaldesc<?php echo $no; ?>" src="assets/buku/<?php echo htmlspecialchars($row['foto']); ?>" alt="Buku" width="100">
                <div class="card-body">
                    <!-- Use CSS to style the title -->
                    <h3 class="card-title h3 text-capitalize scroll-text">
                        <?php echo htmlspecialchars($row['judul']); ?>
                    </h3>
                    <p class="card-title p">Penulis:
                        <?php echo htmlspecialchars($row['penulis']); ?>
                    </p>
                    <p class="card-title p">Penerbit:
                        <?php echo htmlspecialchars($row['penerbit']); ?>
                    </p>
                    <p class="card-title p">Tahun Terbit:
                        <?php echo htmlspecialchars($row['tahun_terbit']); ?>
                    </p>
                    <a href="?page=peminjaman_tambah_cari&&id=<?php echo $row['id_buku']; ?>" style="color:white;"class="btn btn-primary">Pinjam</a>
                    <!-- modaldesc -->
                    <div class="modal fade" id="modaldesc<?php echo $no; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <!-- Modal content -->
                    </div>
                </div>
            </div>
        </div>
    <?php
        $no++; // Increment the value of $no for each iteration of the loop
    }
    ?>
</div>

<!-- Add some space between each row -->
<div class="row mt-3">
    <!-- Create a space below each row -->
</div>

<?php
    } else {
        echo "<h6 class='text-danger text-center mt-3'>No data found</h6>";
    }
}
?>
