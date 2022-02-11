                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><b>Dashboard</b></h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Print Report</a> -->
                    </div>

                    <?php 
                        if ($_SESSION['status'] == 'ADMIN') { ?>
                            <!-- Content Row -->
                    <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                        Total Mitra</div>
                        <?php 
                            $qry = mysqli_query($mysqli, "SELECT COUNT(id) as smasuk FROM tb_mitra");
                            $smasuk = mysqli_fetch_array($qry);
                        ?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $smasuk['smasuk'] ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-address-book fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
<div class="card border-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1"> Jumlah Karyawan</div>
                        <?php 
                            $qry = mysqli_query($mysqli, "SELECT COUNT(id) as skeluar FROM tb_pelamar WHERE status =0 ");
                            $skeluar = mysqli_fetch_array($qry);
                            $qry1 = mysqli_query($mysqli, "SELECT COUNT(id) as user FROM tb_pelamar WHERE status = 1");
                            $user = mysqli_fetch_array($qry1);
                        ?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $skeluar['skeluar'] ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-book fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
<div class="card border-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Pendaftar</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $skeluar['skeluar'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-sign-out-alt fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-12 col-md-12 mb-4">
<div class="card border-second shadow py-2">
        <div class="card-body">
        <iframe src="../calendar-02/index.html" frameborder="0" width="100%" height="500px"></iframe>
        </div>
    </div>
</div>

                        <?php } elseif ($_SESSION['status'] == 'MITRA') { ?>
                           
                            <div class="col-xl-12 col-md-12 mb-4">
<div class="card border-second shadow py-2">
        <div class="card-body">
        <iframe src="../calendar-02/index.html" frameborder="0" width="100%" height="500px"></iframe>
        </div>
    </div>
</div>


                        <?php } elseif ($_SESSION['status'] == 'PESERTA') { ?>

                            <div class="card border-second shadow py-2">
        <div class="card-body">
        <iframe src="../calendar-02/index.html" frameborder="0" width="100%" height="500px"></iframe>
        </div>
    </div>
</div>
</div>
</div>
                            <?php } ?>
                    