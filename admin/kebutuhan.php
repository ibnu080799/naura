                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->
                <?php 
                    $ID = $_GET['id'];
                    $qry1 = mysqli_query($mysqli, "SELECT * FROM tb_mitra WHERE id=$ID");
                    $mitra = mysqli_fetch_array($qry1);
                ?>
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="?page=data-mitra" class="btn btn-warning btn-sm rounded-0 mt-2"><i class="fa fa-arrow-left"></i></a>
                  <h1 class="h4 mb-0 text-gray-800 border-bottom">‎<b>Kebutuhan Mitra <?php echo $mitra['nama']; ?></b></h1>
                </div>

                <!-- DataTables Example -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      Kebutuhan Mitra <?php echo $mitra['nama']; ?>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>PERMINTAAN</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          $dt = mysqli_query($mysqli, "SELECT * FROM tb_kebutuhan WHERE id_mitra = $ID");
                          while ($data = mysqli_fetch_array($dt)) {

                          ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $data['judul']; ?></td>
                              <td>
                                <ul class="list-inline m-0">

                                    <li class="list-inline-item">
                                      <a href="?page=detail-kebutuhan&id_mitra=<?php echo $ID; ?>&id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm rounded-0 mt-2" title="Data Kebutuhan"><i class="fa-arrow-alt-circle-right"></i> Detail</a>
                                    </li>

                                </ul>
                              </td>
                            </tr>
                            <!-- Modal Edit -->
                            <!-- Modal -->
                            <div class="modal fade" id="<?php echo "verifModal" . $no; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">VERIFIKASI</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <?php
                                    if ($data['status'] == 1) {
                                      echo "<b> Apakah Anda Ingin Meng Unverifikasi Data Ini ? </b>";
                                    } elseif ($data['status'] == 0) {
                                      echo "<b> Apakah Anda Yakin Meng Verifikasi Anggota Ini ?</b>";
                                    }
                                    ?>
                                  </div>
                                  <div class="modal-footer">
                                    <a href="?page=data-mitra" class="btn btn-secondary">Batal</a>
                                    <?php
                                    if ($data['status'] == 1) {
                                      echo  '<a href="controller.php?page=verifikasi&action=non-aktif&id=' . $data['id'] . '" class="btn btn-primary">Save changes</a>';
                                    } elseif ($data['status'] == 0) {
                                      echo  '<a href="controller.php?page=verifikasi&action=aktif&id=' . $data['id'] . '" class="btn btn-primary">Save changes</a>';
                                    }
                                    ?>

                                  </div>
                                </div>
                              </div>
                            </div>


                            <!-- Modal Delete -->
                            <!-- Modal DELETE DATA -->
                            <div class="modal fade" id="<?php echo "deleteModal" . $no ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModal">Yakin ingin menghapus data ini?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">Klik "Hapus" jika anda yakin ingin menghapus data ini.</div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                    <a class="btn btn-danger" href="controller.php?page=data-mitra&action=delete&id=<?php echo $data['id'] ?>&page1=<?php echo $_GET['page'] ?>">Hapus</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal fade" id="<?php echo "kelolaakun" . $no ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <form action="controller.php?page=akun-mitra&action=update" method="POST" enctype="multipart/form-data">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="kelolaakun">Kelola Akun</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label for="data2">Username</label>
                                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                        <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="data2">Password (Tidak Di Isi jika tidak berubah)</label>
                                        <input type="text" class="form-control" name="password">
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-success">Simpan</a>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          <?php $no++;
                          } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <!-- </div> -->
                <!-- Modal Edit Update -->
                <div class="modal fade" id="EditMitra" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">

                      <div class="modal-header border-bottom-secondary">
                        <h5 class="modal-title text-gray-900">Edit - Data Mitra</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <form action="controller.php?page=data-mitra&action=update" method="POST" enctype="multipart/form-data">
                        <div class="modal-body text-gray-900">


                          <div class="form-group">
                            <label for="data2">Nama Lengkap</label>
                            <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
                            <input type="hidden" name="id" id="id_anggota">
                            <input type="text" class="form-control" name="nama" id="nama_anggota">
                          </div>
                          <div class="form-group">
                            <label for="data2">NIM / NUPTK</label>
                            <input type="text" class="form-control" name="nim" id="nisn_anggota">
                          </div>

                          <div class="form-group">
                            <label for="data2">Status Anggota</label>
                            <select name="status" class="form-control show-tick" id="status_anggota1">
                              <?php
                              $qry = mysqli_query($mysqli, "SELECT * FROM ref_anggota");
                              while ($status = mysqli_fetch_array($qry)) { ?>
                                <option value="<?php echo $status['id'] ?>"><?php echo $status['status']; ?></option>
                              <?php } ?>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="data2">Kelas</label>
                            <select name="kelas" class="form-control show-tick" id="kelas1">
                              <option value="" id="defaultkelas1">-- Pilih Kelas --</option>
                              <?php
                              $qry = mysqli_query($mysqli, "SELECT * FROM ref_kelas");
                              while ($kls = mysqli_fetch_array($qry)) { ?>
                                <option value="<?php echo $kls['kelas'] ?>"><?php echo $kls['kelas']; ?></option>
                              <?php } ?>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="data2">Jenis Kelamin</label>
                            <select name="jkel" class="form-control show-tick" id="jkel_anggota">
                              <option value="L">Laki - Laki</option>
                              <option value="P">Perempuan</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="data2">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat_anggota">
                          </div>
                          <div class="form-group">
                            <label for="data2">No. Telepon</label>
                            <input type="text" class="form-control" name="no_telp" id="no_telp_anggota">
                          </div>

                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
                <!-- Tutup Modal Edit -->
                <!-- End of Main Content -->


                <!-- Modal ADD DATA -->
                <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">

                      <div class="modal-header border-bottom-secondary">
                        <h5 class="modal-title text-gray-900">Tambah - Data Mitra</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <form action="controller.php?page=data-mitra&action=insert" method="POST" enctype="multipart/form-data">
                        <div class="modal-body text-gray-900">
                          <h4>Data Mitra</h4>
                          <div class="form-group">
                            <label for="data2">Nama</label>
                            <input type="hidden" name="page" value="<?php echo $_GET['page']; ?>">
                            <input type="text" class="form-control" name="nama" required="required">
                          </div>
                          <div class="form-group">
                            <label for="data2">NPWP</label>
                            <input type="text" class="form-control" name="npwp" required="required">
                          </div>

                          <div class="form-group">
                            <label for="data2">Jenis Perusahaan</label>
                            <input type="text" class="form-control" name="jenis_perusahaan" required="required">
                          </div>

                          <div class="form-group">
                            <label for="data2">No. Perusahaan</label>
                            <input type="text" class="form-control" name="no_perusahaan" required="required">
                          </div>
                          <h4>Akun</h4>
                          <div class="form-group">
                            <label for="data2">Email Perusahaan</label>
                            <input type="text" class="form-control" name="email" required="required">
                          </div>
                          <div class="form-group">
                            <label for="data2">Username</label>
                            <input type="text" class="form-control" name="username" required="required">
                          </div>
                          <div class="form-group">
                            <label for="data2">Password</label>
                            <input type="password" class="form-control" name="password" required="required">
                          </div>
                          <div class="form-group">
                            <label for="data2">File (JPG)</label>
                            <input type="file" class="form-control" name="file_name">
                          </div>

                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>



                <!-- Modal EDIT DATA -->

                <script type="text/javascript">
                  $('.confirmation').on('click', function(e) {
                    return confirm('Anda Yakin Menghapus Data Ini?');
                  });
                </script>