<?php
if ($_SESSION['user']['level'] != 'peminjam') {
  ?>
  <div class="container mt-5">
    <div class="container">

      <div class="row">
        <h1 class="mt-4">User Information</h1>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <a href="?page=register_petugas" class="btn btn-primary" style="color:white;"> <i class="fa fa-plus"></i>
                  Tambah User</a>
                <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Password</th>
                    <th>aksi</th>

                  </tr>
                  <?php
                  $i = 1;
                  $query = mysqli_query($koneksi, "SELECT*FROM user");
                  while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                      <td>
                        <?php echo $i++; ?>
                      </td>
                      <td>
                        <?php echo $data['name']; ?>
                      </td>
                      <td>
                        <?php echo $data['email']; ?>
                      </td>
                      <td>
                        <?php echo $data['alamat']; ?>
                      </td>
                      <td>
                        <?php echo $data['no_telepon']; ?>
                      </td>
                      <td>
                        <?php echo $data['username']; ?>
                      </td>
                      <td>
                        <?php echo $data['level']; ?>
                      </td>
                      <td>
                        <?php echo $data['password']; ?>
                      </td>
                      <td>
                        <a href="?page=ulasan_ubah&&id=<?php echo $data['id_user']; ?>" class="btn btn-info">ubah</a>
                        <a onclick="return confirm('apakah anda yakin menghapus data ini');"
                          href="?page=user_hapus&&id=<?php echo $data['id_user']; ?>" class="btn btn-danger">hapus</a>
                      </td>
                    <?php } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>