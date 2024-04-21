<?php
include 'inc/koneksi.php';
if (isset($_POST["query"])) {
    $search = $_POST["query"];
    $sql = "SELECT judul, penulis, foto FROM buku WHERE judul LIKE '%$search%'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        ?>
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['judul']); ?></td>
                        <td><?php echo htmlspecialchars($row['penulis']); ?></td>
                        <td>
                            <!-- Corrected the src path for the image -->
                            <img src="assets/buku/<?php echo htmlspecialchars($row['foto']); ?>" alt="Buku" width="100">
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "<h6 class='text-danger text-center mt-3'>No data found</h6>";
    }
}
?>