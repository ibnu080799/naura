<?php 
  
  $qry = mysqli_query($mysqli, "SELECT * FROM tb_pelamar WHERE id = $ID_USER");
  $data = mysqli_fetch_array($qry);

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 border-bottom">EDIT PROFIL PENGGUNA</h1>
                        <!-- ditambahin icon surat di kiri tulisannya -->
                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          EDIT PROFIL
                            
                        </div>
                        <div class="card-body">
                        <form action="controller.php?page=data-pelamar&action=insert" method="POST" enctype="multipart/form-data">
                        <div class="modal-body text-gray-900">
                          <h4>Data Pelamar</h4>
                          <div class="form-group">
                            <label for="data2">Nama</label>
                            <input type="text" class="form-control" name="nama" required="required" value="<?php echo $data['nama'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="data2">Jenis Kelamin</label>
                            <!-- <input type="text" class="form-control" name="jkl" required="required"> -->
                              <select name="jkl" class="form-control show-tick" id="jkl">
                                <option value="L" <?php if ($data['jkel'] == 'L') {echo "Selected";} ?>>Laki - Laki</option>
                                <option value="P" <?php if ($data['jkel'] == 'P') {echo "Selected";} ?>>Perempuan</option>
                            </option>
                          </div>

                          <div class="form-group">
                            <label for="data2">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" required="required" value="<?php echo $data['tempat_lahir'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="data2">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" required="required" value="<?php echo $data['tgl_lahir'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="data2">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required="required" value="<?php echo $data['alamat'] ?>">
                          </div>

                          <div class="form-group">
                            <label for="data2">No. Handphone</label>
                            <input type="text" class="form-control" name="no_hp" required="required" value="<?php echo $data['no_hp'] ?>">
                          </div>

                          <h4>Akun</h4>
                          <div class="form-group">
                            <label for="data2">Email</label>
                            <input type="text" class="form-control" name="email" required="required" value="<?php echo $data['email'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="data2">Username</label>
                            <input type="text" class="form-control" name="username" required="required" value="<?php echo $data['username'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="data2">Password (Di Isi Jika Berubah) </label>
                            <input type="password" class="form-control" name="password" required="required">
                          </div>
                          <div class="form-group">
                            <label for="data2">Curriculum vitae (PDF) - Di Isi jika Berubah</label>
                            <input type="file" class="form-control" name="file_name">
                          </div>

                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                      </form>
</div>