<form action="controller.php?page=data-pelamar&action=insert" method="POST" enctype="multipart/form-data">
                        <div class="modal-body text-gray-900">
                          <h4>Data Pelamar</h4>
                          <div class="form-group">
                            <label for="data2">Nama</label>
                            <input type="text" class="form-control" name="nama" required="required">
                          </div>
                          <div class="form-group">
                            <label for="data2">Jenis Kelamin</label>
                            <!-- <input type="text" class="form-control" name="jkl" required="required"> -->
                            <option>
                              <select name="jkl" class="form-control show-tick" id="jkl">
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                              </select>
                            </option>
                          </div>

                          <div class="form-group">
                            <label for="data2">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" required="required">
                          </div>

                          <div class="form-group">
                            <label for="data2">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" required="required">
                          </div>

                          <div class="form-group">
                            <label for="data2">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required="required">
                          </div>

                          <div class="form-group">
                            <label for="data2">No. Handphone</label>
                            <input type="text" class="form-control" name="no_hp" required="required">
                          </div>

                          <h4>Akun</h4>
                          <div class="form-group">
                            <label for="data2">Email</label>
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
                            <label for="data2">File (PDF)</label>
                            <input type="file" class="form-control" name="file_name">
                          </div>

                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                      </form>