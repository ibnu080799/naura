<?php include('config/connect-db.php'); ?>
<?php include('config/auth.php'); ?>
<?php include('config/base-url.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php $ID_USER = $_SESSION['id']; ?>

<head>

    <meta charset="utf-8">
    <link rel="icon" href="../css/logo_dam.png" sizes="16x16" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PENYEDIA JASA TENAGA KERJA</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for DataTables -->
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/select2-bootstrap.css">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon ">
                    <img src="../css/logo_dam.png" width="50px" style="margin: 20px;">
                </div>
                <div class="sidebar-brand-text"><?php echo $_SESSION['nama']; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i style="font-size: 17.5px;" class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                
            </div>

            <?php if ($_SESSION['status'] == 'ADMIN') { ?>
            
            <li class="nav-item <?php if($_GET['page'] == 'data-mitra') {echo "active";} ?>" >
                <a class="nav-link" href="?page=data-mitra">
                    <i style="font-size: 17.5px;" class="fas fa-fw fa-handshake"></i>
                    <span>Data Mitra</span></a>
            </li>
            <li class="nav-item <?php if($_GET['page'] == 'data-pelamar') {echo "active";} ?>" >
                <a class="nav-link" href="?page=data-pelamar">
                    <i style="font-size: 17.5px;" class="fas fa-fw fa-cash-register"></i>
                    <span>Data Pelamar</span></a>
            </li>
            <li class="nav-item <?php if($_GET['page'] == 'data-profil') {echo "active";} ?>" >
                <a class="nav-link" href="?page=data-profil">
                    <i style="font-size: 17.5px;" class="fas fa-fw fa-user"></i>
                    <span>Data Profil</span></a>
            </li>

            <!-- Session User -->
            <?php  }elseif ($_SESSION['status'] == 'MITRA') { ?>

            <li class="nav-item <?php if($_GET['page'] == 'profil') {echo "active";} ?>" >
                <a class="nav-link" href="?page=data-buku">
                    <i style="font-size: 17.5px;" class="fas fa-fw fa-book"></i>
                    <span>Profil</span></a>
            </li>
            <li class="nav-item <?php if($_GET['page'] == 'pinjam-buku-user') {echo "active";} ?>" >
                <a class="nav-link" href="?page=pinjam-buku-user">
                    <i style="font-size: 17.5px;" class="fas fa-fw fa-arrow-alt-circle-right"></i>
                    <span>Data</span></a>
            </li>
            
            <?php  }elseif ($_SESSION['status'] == 'PELAMAR') { ?>

            <li class="nav-item <?php if($_GET['page'] == 'home-pelamar') {echo "active";} ?>" >
                <a class="nav-link" href="?page=home-pelamar">
                    <i style="font-size: 17.5px;" class="fas fa-fw fa-user"></i>
                    <span>Profil & Akun</span></a>
            </li>
            <?php } ?>
            <!-- Nav Item - Utilities Collapse Menu -->
             

            <li class="nav-item" >
                <a class="nav-link" href="config/logout.php">
                    <i style="font-size: 17.5px;" class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Log Out</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-danger bg-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i style="font-size: 17.5px;" class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <!--  <li class="nav-item dropdown no-arrow">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">SELAMAT DATANG</span>

                        </li> -->

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">SELAMAT DATANG</span>
                            </a>
                        </li>

                    </ul>

                </nav>

                <!-- End of Topbar -->

            <div class="container">
              <?php
              if (empty($_GET["page"])) {
                include "dashboard.php";
              } elseif ($_GET['page'] == 'data-mitra') {
                include "data-mitra.php";
              } elseif ($_GET['page'] == 'data-pelamar') {
                include "data-pelamar.php";
              } elseif ($_GET['page'] == 'data-profil') {
                include "data-profil.php";
              } elseif ($_GET['page'] == 'home-pelamar') {
                include "home-pelamar.php";
              } elseif ($_GET['page'] == 'pinjam-buku-user') {
                include "pinjam-buku-user.php";
              } elseif ($_GET['page'] == 'settings') {
                include "settings.php";
              } elseif ($_GET['page'] == 'pengembalian-buku') {
                include "pengembalian-buku.php";
              } elseif ($_GET['page'] == 'pengembalian-buku-user') {
                include "pengembalian-buku-user.php";
              } elseif ($_GET['page'] == 'settings-user') {
                include "settings-user.php";
              } elseif ($_GET['page'] == 'laporan') {
                include "laporan.php";
              } elseif ($_GET['page'] == 'rak-buku') {
                include "rak-buku.php";
              } elseif ($_GET['page'] == 'detail-pinjam') {
                include "buku-terpinjam.php";
              } elseif ($_GET['page'] == 'penerbit') {
                include "penerbit.php";
              } elseif ($_GET['page'] == 'settings') {
                include "settings.php";
              } 
              ?>
            </div> <!-- /.container-fluid -->
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">tinggalkan halaman?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">klik "Logout" jika ingin meninggalkan halaman. </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="config/logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PT. DHARMA AGUNG MAKMUR 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Tooltip -->
    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/anchor.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
        $( ".select2-single, .select2-multiple" ).select2( {
				placeholder: placeholder,
				width: null,
				containerCssClass: ':all:'
			} );
    </script>
</body>
<script src="assets/lib/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
<?php include('assets/paginasi/script-paginasi.php'); ?>
<?php 
function TanggalIndo($date){
  $BulanIndo = array( 
                    "Januari", 
                    "Februari", 
                    "Maret", 
                    "April", 
                    "Mei", 
                    "Juni", 
                    "Juli", 
                    "Agustus", 
                    "September", 
                    "Oktober", 
                    "November", 
                    "Desember"
                    );

  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl   = substr($date, 8, 2);

  $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
  return($result);
} ?>
</html>
<script>
			anchors.options.placement = 'left';
			anchors.add('.container h1, .container h2, .container h3, .container h4, .container h5');

			// Set the "bootstrap" theme as the default theme for all Select2
			// widgets.
			//
			// @see https://github.com/select2/select2/issues/2927
			$.fn.select2.defaults.set( "theme", "bootstrap" );

			var placeholder = "Select a State";

			$( ".select2-single, .select2-multiple" ).select2( {
				placeholder: placeholder,
				width: null,
				containerCssClass: ':all:'
			} );

			$( ".select2-allow-clear" ).select2( {
				allowClear: true,
				placeholder: placeholder,
				width: null,
				containerCssClass: ':all:'
			} );

			// @see https://select2.github.io/examples.html#data-ajax
			function formatRepo( repo ) {
				if (repo.loading) return repo.text;

				var markup = "<div class='select2-result-repository clearfix'>" +
					"<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
					"<div class='select2-result-repository__meta'>" +
						"<div class='select2-result-repository__title'>" + repo.full_name + "</div>";

				if ( repo.description ) {
					markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
				}

				markup += "<div class='select2-result-repository__statistics'>" +
							"<div class='select2-result-repository__forks'><span class='glyphicon glyphicon-flash'></span> " + repo.forks_count + " Forks</div>" +
							"<div class='select2-result-repository__stargazers'><span class='glyphicon glyphicon-star'></span> " + repo.stargazers_count + " Stars</div>" +
							"<div class='select2-result-repository__watchers'><span class='glyphicon glyphicon-eye-open'></span> " + repo.watchers_count + " Watchers</div>" +
						"</div>" +
					"</div></div>";

				return markup;
			}

			function formatRepoSelection( repo ) {
				return repo.full_name || repo.text;
			}

			$( ".js-data-example-ajax" ).select2({
				width : null,
				containerCssClass: ':all:',
				ajax: {
					url: "https://api.github.com/search/repositories",
					dataType: 'json',
					delay: 250,
					data: function (params) {
						return {
							q: params.term, // search term
							page: params.page
						};
					},
					processResults: function (data, params) {
						// parse the results into the format expected by Select2
						// since we are using custom formatting functions we do not need to
						// alter the remote JSON data, except to indicate that infinite
						// scrolling can be used
						params.page = params.page || 1;

						return {
							results: data.items,
							pagination: {
								more: (params.page * 30) < data.total_count
							}
						};
					},
					cache: true
				},
				escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
				minimumInputLength: 1,
				templateResult: formatRepo,
				templateSelection: formatRepoSelection
			});

			$( "button[data-select2-open]" ).click( function() {
				$( "#" + $( this ).data( "select2-open" ) ).select2( "open" );
			});

			$( ":checkbox" ).on( "click", function() {
				$( this ).parent().nextAll( "select" ).prop( "disabled", !this.checked );
			});

			// copy Bootstrap validation states to Select2 dropdown
			//
			// add .has-waring, .has-error, .has-succes to the Select2 dropdown
			// (was #select2-drop in Select2 v3.x, in Select2 v4 can be selected via
			// body > .select2-container) if _any_ of the opened Select2's parents
			// has one of these forementioned classes (YUCK! ;-))
			$( ".select2-single, .select2-multiple, .select2-allow-clear, .js-data-example-ajax" ).on( "select2:open", function() {
				if ( $( this ).parents( "[class*='has-']" ).length ) {
					var classNames = $( this ).parents( "[class*='has-']" )[ 0 ].className.split( /\s+/ );

					for ( var i = 0; i < classNames.length; ++i ) {
						if ( classNames[ i ].match( "has-" ) ) {
							$( "body > .select2-container" ).addClass( classNames[ i ] );
						}
					}
				}
			});
		</script>