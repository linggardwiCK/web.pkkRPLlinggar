<?php
include 'inc/koneksi.php';
if (isset($_POST["query"])) {
    $search = $_POST["query"];
    $sql = "SELECT ulasan.id_ulasan, ulasan.id_user, ulasan.id_buku, ulasan, rating, judul, user.name 
            FROM ulasan 
            LEFT JOIN user ON user.id_user = ulasan.id_user 
            LEFT JOIN buku ON buku.id_buku = ulasan.id_buku 
            WHERE judul LIKE '%$search%'";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            ?>

            <div class="row container">
                <div class="col-sm-12">
                    <div class="">
                        <div class="row">
                            <table>
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Buku</th>
                                        <th>Ulasan</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['judul']; ?></td>
                                            <td><?php echo $row['ulasan']; ?></td>
                                            <td><?php
                                            
                                            $rating = $row['rating'];
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
                                            ?><?php echo $row['rating']; ?>/10
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "<h6 class='text-danger text-center mt-3'>No data found</h6>";
        }
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
}
?>