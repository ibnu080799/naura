<?php
    
    include 'config/connect-db.php';
    include 'config/base-url.php';
    include 'config/auth.php';
 
	$page    = $_GET['page'];
	$action  = $_GET['action'];

	/* Verifikasi Relawan */
	if ($page == "verifikasi" && $action == "aktif") {
		$ID = $_GET['id'];
		$result = mysqli_query($mysqli, "UPDATE tb_pelamar SET status = 1 WHERE id = $ID") or die(mysqli_error($mysqli));
		if($result){ 
			echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-pelamar" </script>';
		}else{
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		}
	}elseif ($page == "verifikasi" && $action == "non-aktif") {
		$ID = $_GET['id'];
		$result = mysqli_query($mysqli, "UPDATE tb_pelamar SET status = 0 WHERE id = $ID") or die(mysqli_error($mysqli));
		if($result){ 
			echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-pelamar" </script>';
		}else{
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		}
	}

	/* MITRA */
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
			$dirUpload     = "assets/cover/";
			move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		 $page = $_POST['page'];

		$result = mysqli_query($mysqli, "INSERT INTO tb_mitra SET
											id = '', 
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
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "data-mitra" && $action == "update")
	{

		  $ID = $_POST['id'];
		  $kode = $_POST['kode'];
		  $nama = $_POST['nama'];
		  $npwp = $_POST['npwp'];
		  $jenis_perusahaan = $_POST['jenis_perusahaan'];
		  $no_perusahaan = $_POST['no_perusahaan'];
		  $email_perusahaan = $_POST['email'];
		  $username = $_POST['username'];
		  $password = $_POST['password'];
		  $status = $_POST['status'];
		  
 
			  $type	       = $_FILES["file_name"]["type"];
			   $namaFile      = "file-".date('Y-m-d H-i-s')."-cover.pdf";
			 $namaSementara = $_FILES['file_name']['tmp_name'];
			 $size          = $_FILES['file_name']['size'];
			 $dirUpload     = "assets/cover/";
			 move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		$page = $_POST['page'];

				  $result = mysqli_query($mysqli, "UPDATE tb_mitra SET
													nama = '$nama',
													npwp = '$npwp',
													jenis_perusahaan = '$jenis_perusahaan',
													no_perusahaan = '$no_perusahaan',
													email_perusahaan = '$email_perusahaan',
													username = '$username',
													password = '$password',
													file_name = 'assets/filedata/$namaFile',
													status = '$status',
													WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "data-mitra" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM tb_mitra WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}

	/* PELAMAR */
	if($page == "pelamar" && $action == "insert")
	{

		 $nama = $_POST['nama'];
		 $jkl = $_POST['jkl'];
		 $tempat_lahir = $_POST['tempat_lahir'];
		 $tgl_lahir = $_POST['tgl_lahir'];
		 $alamat = $_POST['alamat'];
		 $no_hp = $_POST['no_hp'];
		 $email = $_POST['email'];
		 $username = $_POST['username'];
		 $password = $_POST['password'];

		 $type	       = $_FILES["file_name"]["type"];
		  	$namaFile      = "file-".date('Y-m-d H-i-s')."-cover.pdf";
			$namaSementara = $_FILES['file_name']['tmp_name'];
			$size          = $_FILES['file_name']['size'];
			$dirUpload     = "assets/cover/";
			move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		$page = $_POST['page'];

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
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "pelamar" && $action == "update")
	{

		$ID = $_POST['id'];
		$nama = $_POST['nama'];
		 $jkl = $_POST['jkl'];
		 $tempat_lahir = $_POST['tempat_lahir'];
		 $tgl_lahir = $_POST['tgl_lahir'];
		 $alamat = $_POST['alamat'];
		 $no_hp = $_POST['no_hp'];
		 $email = $_POST['email'];
		 $username = $_POST['username'];
		 $password = $_POST['password'];
		 $status = $_POST['status'];

		 $type	       = $_FILES["file_name"]["type"];
		  	$namaFile      = "file-".date('Y-m-d H-i-s')."-cover.pdf";
			$namaSementara = $_FILES['file_name']['tmp_name'];
			$size          = $_FILES['file_name']['size'];
			$dirUpload     = "assets/cover/";
			move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		$page = $_POST['page'];

				  $result = mysqli_query($mysqli, "UPDATE tb_pelamar SET
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
													status = '$status',
													WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "pelamar" && $action == "delete")
	{

		  $ID = $_GET['id'];

				  $result = mysqli_query($mysqli, "DELETE FROM tb_pelamar WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}

	/* ADMIN PROFIL */
	if($page == "admin" && $action == "insert")
	{

		 $kode = $_POST['kode_rak'];
		 $page = $_POST['page'];

		$result = mysqli_query($mysqli, "INSERT INTO tbl_profil SET
											kode_rak = '$kode'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "admin" && $action == "update")
	{

		  $ID = $_POST['id'];
		  $kode = $_POST['kode_rak'];
		$page = $_POST['page'];

				  $result = mysqli_query($mysqli, "UPDATE tbl_profil SET
													kode_rak = '$kode'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "admin" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM admin WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}

	/* KEBUTUHAN */
	if($page == "data-kebutuhan" && $action == "insert")
	{

		 $id_mitra = $_POST['id_mitra'];
		 $judul = $_POST['judul'];
		 $deskripsi = $_POST['deskripsi'];

		$result = mysqli_query($mysqli, "INSERT INTO tb_kebutuhan SET
											id_mitra = '$id_mitra',
											judul = '$judul',
											deskripsi = '$deskripsi'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-kebutuhan" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "data-kebutuhan" && $action == "update")
	{
		$ID = $_POST['id'];
		$judul = $_POST['judul'];
		$deskripsi = $_POST['deskripsi'];

				  $result = mysqli_query($mysqli, "UPDATE tb_kebutuhan SET
													judul = '$judul',
													deskripsi = '$deskripsi'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-kebutuhan" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "data-kebutuhan" && $action == "delete")
	{

		  $ID = $_GET['id'];

				  $result = mysqli_query($mysqli, "DELETE FROM tb_kebutuhan WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-kebutuhan" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}

	/* Settings */
	if($page == "settings" && $action == "insert")
	{

		 $page1 = $_POST['page1'];
		 $nama = $_POST['nama'];
		 $username = $_POST['username'];
		 $password = MD5($_POST['password']);
		 $email = $_POST['email'];
		 $status = $_POST['status'];

		$result = mysqli_query($mysqli, "INSERT INTO tb_users SET
											nama = '$nama',
											username = '$username',
											password = '$password',
											email = '$email',
											status = '$status'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "settings" && $action == "update")
	{

		 $ID = $_POST['id'];
		 $page1 = $_POST['page1'];
		 $nama = $_POST['nama'];
		 $username = $_POST['username'];
		 $password = $_POST['password'];
		 $email = $_POST['email'];
		 $status = $_POST['status'];

		 if (is_null($password)) {
		 	$result = mysqli_query($mysqli, "UPDATE tb_users SET
											nama = '$nama',
											username = '$username',
											email = '$email',
											status = '$status' WHERE id = $ID"); 
		 }else{
		 	$pass = MD5($password);
		 	$result = mysqli_query($mysqli, "UPDATE tb_users SET
											nama = '$nama',
											username = '$username',
											password = '$pass',
											email = '$email',
											status = '$status' WHERE id = $ID"); 
		 }

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "settings-user" && $action == "update")
	{

		 $ID = $_POST['id'];
		 $page1 = $_POST['page1'];
		 $nama = $_POST['nama'];
		 $username = $_POST['username'];
		 $password = $_POST['password'];
		 $email = $_POST['email'];

		 if (is_null($password)) {
		 	$result = mysqli_query($mysqli, "UPDATE tb_users SET
											nama = '$nama',
											username = '$username',
											email = '$email' WHERE id = $ID"); 
		 }else{
		 	$pass = MD5($password);
		 	$result = mysqli_query($mysqli, "UPDATE tb_users SET
											nama = '$nama',
											username = '$username',
											password = '$pass',
											email = '$email' WHERE id = $ID"); 
		 }

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "settings" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM tb_users WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}
?>