<?php include('admin/config/connect-db.php'); ?>

<!DOCTYPE html>
<!-- saved from url=(0051)https://getbootstrap.com/docs/5.0/examples/sign-in/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="css/logo_dam.png" sizes="16x16" type="image/png">
<link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="css/logo_dam.png">
<!-- Sweet Alert -->
<script src="sweetalert/sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert/sweetalert2.min.css">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      body{
        background: #d4981f;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
<body class="text-center" style="background-image: url(css/Background_dam.jpg);" >

<div class="card rounded mx-auto d-block">
<main class="form-signin">
  <form method="POST" id="formLogin">
    <img class="mb-4" src="css/logo_dam.png" alt="" width="120" height="120">
    <b><h1 class="h3 mb-3 fw-normal" style="color: black;">Login <br>Penyedia Jasa Tenaga Kerja</h1></b>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
      <label for="floatingInput">Username</label>
    </div>
    <br>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-group">
      <label for="data2">Hak Akses</label>
      <select name="status" class="form-control show-tick" required="required">
        <option value="admin">Admin</option>
        <option value="mitra">Mitra </option>
        <option value="pelamar">Pelamar</option>
      </select>
    </div>

    <div class="checkbox mb-3">
      <label style="color: black;">
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-warning" type="submit">Masuk</button>
    <div class="mt-2 mb-2">Belum Punya Akun ? <a href="#" data-bs-toggle="modal" data-bs-target="#addDataModal">Daftar</a></div>
    
    <p class="mt-5 mb-3 text-muted" style="color: black;">© PT. DHARMA AGUNG MAKMUR 2022</p>
  </form>
</main>
</div>    

    
  

</body></html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Modal ADD DATA -->
            <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                  <div class="modal-header border-bottom-secondary">
                    <h5 class="modal-title text-gray-900">Daftar Anggota Baru</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form id="formMhs" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-gray-900">
                      <h4>Data Anggota</h4>
                      <div class="form-group">
                        <label for="data2">Nama Lengkap</label>
                        
                        <input type="text" class="form-control" name="nama" required="required">
                      </div>
                      <div class="form-group">
                        <label for="data2">NISN / NUPTK</label>
                        <input type="text" class="form-control" name="nim" required="required">
                      </div>

                      <div class="form-group">
                        <label for="data2">Status Anggota</label>
                        <select name="status" class="form-control show-tick" required="required" id="status_anggota">
                                <?php  
                                  $qry = mysqli_query($mysqli, "SELECT * FROM ref_anggota");
                                    while($status = mysqli_fetch_array($qry)){ ?>
                                <option value="<?php echo $status['id'] ?>"><?php echo $status['status']; ?></option>
                            <?php } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="data2">Kelas</label>
                        <select name="kelas" class="form-control show-tick" required="required" id="kelas">
                                <option value="" id="defaultkelas">-- Pilih Kelas --</option>
                                <?php  
                                  $qry = mysqli_query($mysqli, "SELECT * FROM ref_kelas");
                                    while($data = mysqli_fetch_array($qry)){ ?>
                                <option value="<?php echo $data['kelas'] ?>"><?php echo $data['kelas']; ?></option>
                            <?php } ?>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="data2">Jenis Kelamin</label>
                        <select name="jkel" class="form-control show-tick" required="required">
                          <option value="L">Laki - Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="data2">Alamat</label>
                        <input type="text" class="form-control" name="alamat" required="required">
                      </div>
                      <div class="form-group">
                        <label for="data2">No. Telepon</label>
                        <input type="text" class="form-control" name="no_telp" required="required">
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
                      
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
            <script src="admin/vendor/jquery/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() { 
  $("#formMhs").submit(function(e) {
      e.preventDefault();
      $.ajax({
          url: 'admin/controller.php?page=data-siswa-new&action=insert',
          type: 'post',
          data: $(this).serialize(),             
          success: function(data) {    
            document.getElementById("formMhs").reset();
            $('#addDataModal').modal('toggle');           
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Pendaftaran Anda Sudah Tersimpan',
              text: 'Harap Menunggu Konfirmasi Akun',
              showConfirmButton: true
            });
          }
      });
  });
})

$(document).ready(function() { 
  $("#formlogin").submit(function(e) {
      e.preventDefault();
      $.ajax({
          url: 'admin/controller.php?page=data-siswa-new&action=insert',
          type: 'post',
          data: $(this).serialize(),             
          success: function(data) {    
            document.getElementById("formlogin").reset();
            $('#addDataModal').modal('toggle');           
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Pendaftaran Anda Sudah Tersimpan',
              text: 'Harap Menunggu Konfirmasi Akun',
              showConfirmButton: true
            });
          }
      });
  });
})

$(document).ready(function() { 
$("#formLogin").submit(function(e) {
var data = $("#formLogin").serialize();
  $.ajax({

        type : 'POST',
        url  : 'proses_login.php',
        data : data,
        success :  function(response){      
          if (response == "error") {

            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Akun Mungkin Belum Terkonfirmasi atau Belum Mendaftar',
              footer: '<button class="btn btn-danger register" onclick="Swal.close()">Belum Mendaftar?</button>'
            });
            
          }else{
            var myJson = JSON.parse(response);
            
            Swal.fire({
              icon: 'success',
              type: 'success',
              title: 'Success!',
              text: 'Login Berhasil',
              timer: 1000
            });
            setTimeout(function() {window.location.href = myJson.url;}, 1000);
            /* console.log(myJson);
            alert(myJson.status); */
            
          }
        }/*  */
        });
          return false;
    });
});
</script>
<script>
    $(document).ready(function() {
        document.getElementById("kelas").disabled = true;
        $("#status_anggota").change(function() {
            
            var x = document.getElementById("status_anggota").value;
            if (x == 1 || x == 2)
            {
                document.getElementById("defaultkelas").selected = "true";
                document.getElementById("kelas").disabled = true;
            }else{
                document.getElementById("kelas").disabled = false;
            }
            
        });
        $("#status_anggota1").change(function() {
            
            var x = document.getElementById("status_anggota1").value;
            if (x == 1 || x == 2)
            {
                document.getElementById("defaultkelas1").selected = "true";
                document.getElementById("kelas1").disabled = true;
            }else{
                document.getElementById("kelas1").disabled = false;
            }
            
        });
    });
</script>