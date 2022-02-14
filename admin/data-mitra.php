                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                  <h1 class="h4 mb-0 text-gray-800 border-bottom">‎<b>Kelola Data Mitra</b></h1>
                  <!-- ditambahin icon surat di kiri tulisannya -->


                </div>

                <!-- DataTables Example -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <?php if ($_SESSION['status'] == 'ADMIN') { ?>
                      <a class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus-circle" aria-hidden="true"></i> Tambah Data Mitra</a>
                    <?php  } elseif ($_SESSION['status'] = 'USER') {
                      echo " - ";
                    } ?>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>Status Perusahaan</th>
                            <th>NAMA</th>
                            <th>NPWP</th>
                            <th>JENIS PERUSAHAAN</th>
                            <th>EMAIL PERUSAHAAN</th>

                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          $dt = mysqli_query($mysqli, "SELECT * FROM tb_mitra");
                          while ($data = mysqli_fetch_array($dt)) {

                          ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td>
                                <input type="checkbox" class="form-control" id="1" name="status1" value="1" <?php if ($data['status'] <> 0) {
                                                                                                              echo "Checked";
                                                                                                            } ?> data-toggle="modal" data-target="<?php echo "#verifModal" . $no; ?>">
                              </td>
                              <td><?php echo $data['nama']; ?></td>
                              <td><?php echo $data['npwp']; ?></td>
                              <td><?php echo $data['jenis_perusahaan']; ?></td>
                              <td><?php echo $data['email_perusahaan']; ?></td>
                              <td>
                                <ul class="list-inline m-0">

                                    <li class="list-inline-item edit-mitra" data-id="<?php echo $data['id'] ?>" data-nama="<?php echo $data['nama'] ?>" data-npwp="<?php echo $data['npwp'] ?>" data-jenis="<?php echo $data['jenis_perusahaan'] ?>" data-email="<?php echo $data['email_perusahaan'] ?>" data-username="<?php echo $data['username'] ?>" data-password="<?php echo $data['password'] ?>" data-filename="<?php echo $data['file_name'] ?>" data-status="<?php echo $data['status'] ?>">
                                      <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                    </li>
                                    <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#deleteModal" . $no ?>">
                                      <button class="confirmation btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                    </li>
                                    <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#kelolaakun" . $no ?>">
                                      <button class="confirmation btn btn-warning btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Kelola Akun"><i class="fa fa-user"></i></button>
                                    </li>
                                    <li class="list-inline-item">
                                      <a href="?page=kebutuhan&id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm rounded-0 mt-2" title="Data Kebutuhan"><i class="fa fa-list"></i></a>
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