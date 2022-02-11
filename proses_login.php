<?php

//* Includde Koneksi Ke database
include_once("admin/config/connect-db.php");

//* Include Base Url
include_once("admin/config/base-url.php");


	$username = $_POST['username'];
	$pass     = md5($_POST['password']);
	$status   = $_POST['status'];

	if ($status == 'admin') {
		$login = mysqli_query($mysqli, "SELECT * FROM tb_profil WHERE username = '$username' AND password='$pass'");
		$row = mysqli_fetch_array($login);
		if ($row['username'] == $username AND $row['password'] == $pass AND $row['status'] != 0)
		{

		session_start();
		$_SESSION['nama']        = $row['nama'];
		$_SESSION['username']    = $row['username'];
		$_SESSION['status']		= 'ADMIN';
		$_SESSION['id'] = $row['id'];

		// Jika Sukses, redirect halaman menggunakan javascript
		echo json_encode(array('status' => 'ok', 'url'=>$base_url_back.'/index.php'));

		}

		else  
		{

		// Jika Sukses, redirect halaman menggunakan javascript
		/* echo '<script language="javascript"> window.location.href = "'.$base_url_front.'/index.php" </script>'; */
		echo "error";

		}
	} elseif ($status == 'mitra') {
		$login = mysqli_query($mysqli, "SELECT * FROM tb_mitra WHERE username = '$username' AND password='$pass'");
		$row = mysqli_fetch_array($login);
		if ($row['username'] == $username AND $row['password'] == $pass AND $row['status'] != 0)
		{

		session_start();
		$_SESSION['nama']        = $row['nama'];
		$_SESSION['username']    = $row['username'];
		$_SESSION['status']		 = 'MITRA';
		$_SESSION['id'] 		 = $row['id'];

		// Jika Sukses, redirect halaman menggunakan javascript
		echo json_encode(array('status' => 'ok', 'url'=>$base_url_back.'/index.php'));

		}

		else  
		{

		// Jika Sukses, redirect halaman menggunakan javascript
		/* echo '<script language="javascript"> window.location.href = "'.$base_url_front.'/index.php" </script>'; */
		echo "error";

		}
	} elseif ($status == 'pelamar'){
		$login = mysqli_query($mysqli, "SELECT * FROM tb_pelamar WHERE username = '$username' AND password='$pass'");
		$row = mysqli_fetch_array($login);
		if ($row['username'] == $username AND $row['password'] == $pass AND $row['status'] != 0)
		{

		session_start();
		$_SESSION['nama']        = $row['nama'];
		$_SESSION['username']    = $row['username'];
		$_SESSION['status'] 	 = 'PELAMAR';
		$_SESSION['id'] = $row['id'];

		// Jika Sukses, redirect halaman menggunakan javascript
		echo json_encode(array('status' => 'ok', 'url'=>$base_url_back.'/index.php'));

		}

		else  
		{

		// Jika Sukses, redirect halaman menggunakan javascript
		/* echo '<script language="javascript"> window.location.href = "'.$base_url_front.'/index.php" </script>'; */
		echo "error";

		}
	}
	
	

?>