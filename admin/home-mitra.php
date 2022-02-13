<?php 
  
  $qry = mysqli_query($mysqli, "SELECT * FROM tb_mitra WHERE id = $ID_USER");
  $data = mysqli_fetch_array($qry);

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 border-bottom">PROFIL MITRA</h1>
                        <!-- ditambahin icon surat di kiri tulisannya -->
                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          PROFIL MITRA
                            
                        </div>
                        <div class="card-body">
                        <form action="controller.php?page=data-mitra&action=update" method="POST" enctype="multipart/form-data">
                        <div class="modal-body text-gray-900">
                          
                          <div class="form-group">
                            <label for="data2">Nama Mitra</label>
                            <input type="text" class="form-control" name="nama" required="required" value="<?php echo $data['nama'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="data2">NPWP</label>
                            <input type="text" class="form-control" name="npwp" required="required" value="<?php echo $data['npwp'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="data2">Jenis Perusahaan</label>
                            <input type="text" class="form-control" name="jenis_perusahaan" required="required" value="<?php echo $data['jenis_perusahaan'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="data2">No. Perusahaan</label>
                            <input type="text" class="form-control" name="no_perusahaan" required="required" value="<?php echo $data['no_perusahaan'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="data2">Email Perusahaan </label>
                            <input type="text" class="form-control" name="email_perusahaan" required="required" value="<?php echo $data['email_perusahaan'] ?>">
                          </div>
                          <h4>Akun</h4>
                          <div class="form-group">
                            <label for="data2">Username</label>
                            <input type="text" class="form-control" name="email_perusahaan" required="required" value="<?php echo $data['username'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="data2">Password</label>
                            <input type="password" class="form-control" name="password">
                          </div>
                          <div class="form-group">
                            <label for="data2">Profil Mitra (PDF)</label>
                            <input type="file" class="form-control" name="file_name">
                          </div>

                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                      </form>
</div>