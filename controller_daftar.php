<?php
    
    include 'admin/config/connect-db.php';
 
	$page    = $_GET['page'];
	$action  = $_GET['action'];

	if($page == "data-mitra" && $action == "insert")
	{

		 $nama = $_POST['nama'];
		 $npwp = $_POST['npwp'];
		 $jenis_perusahaan = $_POST['jenis_perusahaan'];
		 $no_perusahaan = $_POST['no_perusahaan'];
		 $email_perusahaan = $_POST['email'];
		 $username = $_POST['username'];
		 $password = $_POST['password'];

		 	$type	       = $_FILES["file_name"]["type"];
		  	$namaFile      = "file-".date('Y-m-d H-i-s')."-cover.pdf";
			$namaSementara = $_FILES['file_name']['tmp_name'];
			$size          = $_FILES['file_name']['size'];
			$dirUpload     = "admin/assets/cover/";
			move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		$result = mysqli_query($mysqli, "INSERT INTO tb_mitra SET
											nama = '$nama',
											npwp = '$npwp',
											jenis_perusahaan = '$jenis_perusahaan',
											no_perusahaan = '$no_perusahaan',
											email_perusahaan = '$email_perusahaan',
											username = '$username',
											password = '$password',
											file_name = 'assets/filedata/$namaFile',
											status = 0"); 

		  if($result){ 
            // echo json_encode(array('status' => 'ok'));
			echo "Ok";
		  }else{
            // echo json_encode(array('status' => 'error'));
			echo "error";
		  }

	} elseif($page == "data-pelamar" && $action == "insert")
	{

		 $nama = $_POST['nama'];
		 $jkl = $_POST['jkl'];
		 $tempat_lahir = $_POST['tempat_lahir'];
		 $tgl_lahir = $_POST['tgl_lahir'];
		 $alamat = $_POST['alamat'];
		 $no_hp = $_POST['no_hp'];
		 $email = $_POST['email'];
		 $username = $_POST['username'];
		 $password = md5($_POST['password']);

		    $type	       = $_FILES["file_name"]["type"];
		  	$namaFile      = "file-".date('Y-m-d H-i-s')."-cover.pdf";
			$namaSementara = $_FILES['file_name']['tmp_name'];
			$size          = $_FILES['file_name']['size'];
			$dirUpload     = "admin/assets/cover/";
			move_uploaded_file($namaSementara, $dirUpload.$namaFile);

            $result = mysqli_query($mysqli, "INSERT INTO tb_pelamar SET
                                            nama = '$nama',
                                            jkl = '$jkl',
                                            tempat_lahir = '$tempat_lahir',
                                            tgl_lahir = '$tgl_lahir',
                                            alamat = '$alamat',
                                            no_hp = '$no_hp',
                                            email = '$email',
                                            username = '$username',
                                            password = '$password',
                                            file_name = 'assets/filedata/$namaFile',
                                            status = 0");

		  if($result){ 
            echo "ok";
		  }else{
            echo "error";
		  }
	}
?>