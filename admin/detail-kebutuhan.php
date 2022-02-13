<?php 
    $ID = $_GET['id'];
    $qry = mysqli_query($mysqli, "SELECT * FROM tb_kebutuhan WHERE id=$ID");
    $data = mysqli_fetch_array($qry);
?>
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <a href="?page=kebutuhan&id=<?php echo $_GET['id_mitra']; ?>" class="btn btn-warning btn-sm rounded-0 mt-2"><i class="fa fa-arrow-left"></i></a>
                    <h1 class="h3 mb-0 text-gray-800"><b>Detail Kebutuhan <?php echo $data['judul'] ?> </b></h1>
                </div>

                <div class="row">

                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card border-second shadow py-2">
                            <div class="card-body mt-4 mb-4">
                            <?php echo $data['deskripsi']; ?>
                            </div>
                        </div>
                    </div>
                </div>