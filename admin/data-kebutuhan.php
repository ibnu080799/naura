                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->
                <script src="assets/ckeditor/ckeditor.js"></script>
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800 border-bottom">Pengaturan</h1>
                        <!-- ditambahin icon surat di kiri tulisannya -->
                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus-circle" aria-hidden="true"></i> Tambah Data Mitra</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Permintaan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $dt = mysqli_query($mysqli, "SELECT * FROM tb_kebutuhan");
                                            while($data = mysqli_fetch_array($dt)){

                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data['judul'];?></td>
                                            <td>
                                              <ul class="list-inline m-0">
                                                <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#editModal".$no;?>">
                                                  <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li>
                                                <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#deleteModal".$no ?>">
                                                  <button class="confirmation btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li>
                                              </ul>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="<?php echo "editModal".$no;?>" tabindex="-1" role="dialog" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">

                                              <div class="modal-header border-bottom-secondary">
                                                <h5 class="modal-title text-gray-900">Edit - Kebutuhan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>

                                              <form action="controller.php?page=data-kebutuhan&action=update" method="POST">
                                                <div class="modal-body text-gray-900">

                                                  <div class="form-group">
                                                    <label for="data1">Permintaan</label>
                                                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                                    <input type="text" class="form-control" id="data1" name="judul" value="<?php echo $data['judul'];?>">
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="data2">Deskripsi</label>
                                                    <textarea name="deskripsi" id="<?php echo "edit_data".$no; ?>" class="form-control"><?php echo $data['deskripsi']; ?></textarea>
                                                  </div>
                                                  <script>
                                                        var editor = CKEDITOR.replace( '<?php echo "edit_data".$no; ?>', {
                                                                height: 400,
                                                                wordcount: {
                                                                    maxWordCount: 1300,
                                                                },
                                                                title: 'Rich Text Editor'
                                                            } );    
                                                        editor.on( 'change', function( evt ) { $('#<?php echo "edit_data".$no; ?>').val(evt.editor.getData()); }); 
                                                    </script>

                                                </div>
                                                <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                  <button type="submit" class="btn btn-success">Simpan</button>
                                                </div>
                                              </form>

                                            </div>
                                          </div>
                                        </div>

                                        <!-- Modal Delete -->
                                        <!-- Modal DELETE DATA -->
                                        <div class="modal fade" id="<?php echo "deleteModal".$no ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                        <a class="btn btn-danger" href="controller.php?page=data-kebutuhan&action=delete&id=<?php echo $data['id'] ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $no++;} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            <!-- </div> -->
            <!-- End of Main Content -->


            <!-- Modal ADD DATA -->
            <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                  <div class="modal-header border-bottom-secondary">
                    <h5 class="modal-title text-gray-900">Tambah - Kebutuhan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="controller.php?page=data-kebutuhan&action=insert" method="POST">
                    <div class="modal-body text-gray-900">

                      <div class="form-group">
                        <label for="data1">Permintaan</label>
                        <input type="hidden" name="id_mitra" value="<?php echo $ID_USER;?>">
                        <input type="text" class="form-control" id="data1" name="judul" required="required">
                      </div>
                      <div class="form-group">
                        <label for="data2">Deskripsi</label>
                        <textarea name="deskripsi" id="input_data" class="form-control" required="required"></textarea>
                      </div>
                    
                      <script>
                            var editor = CKEDITOR.replace( 'input_data', {
                                    height: 400,
                                    wordcount: {
                                        maxWordCount: 1300,
                                    },
                                    title: 'Rich Text Editor'
                                } );    
                            editor.on( 'change', function( evt ) { $('#input_data').val(evt.editor.getData()); }); 
                        </script>

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
    }); </script>