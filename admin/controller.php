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

	/* DATA BUKU */
	if($page == "data-buku" && $action == "insert")
	{

		$page 		= $_POST['page'];
		$id_kategori 	= $_POST['id_kategori'];
		$id_rak_buku 	= $_POST['id_rak_buku'];
		$no_buku = $_POST['no_buku'];
		$tahun = $_POST['tahun'];
		$pengarang 	= $_POST['pengarang'];
		$judul 	= $_POST['judul'];
		$kota 	= $_POST['kota'];
		$penerbit = $_POST['penerbit'];
		$tahun_terbit = $_POST['tahun_terbit'];
		$jumlah = $_POST['jumlah'];
		$isi_ringkas = $_POST['isi_ringkas'];
		
			$type	       = $_FILES["file_name"]["type"];
		  	$namaFile      = "file-".date('Y-m-d H-i-s')."-cover.jpg";
			$namaSementara = $_FILES['file_name']['tmp_name'];
			$size          = $_FILES['file_name']['size'];
			$dirUpload     = "assets/cover/";
			move_uploaded_file($namaSementara, $dirUpload.$namaFile);

			

		$result = mysqli_query($mysqli, "INSERT INTO tb_buku SET
											id_kategori = '$id_kategori', 
											id_rak_buku = '$id_rak_buku', 
											no_buku = '$no_buku', 
											tahun = '$tahun', 
											pengarang = '$pengarang', 
											judul = '$judul', 
											kota = '$kota', 
											id_penerbit = '$penerbit',
											tahun_terbit = '$tahun_terbit',
											jumlah = '$jumlah',
											isi_ringkas = '$isi_ringkas',
											file_name = 'assets/cover/$namaFile'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "data-buku" && $action == "update")
	{

		$ID 		= $_POST['id'];
		$page 		= $_POST['page'];
		$id_kategori 	= $_POST['id_kategori'];
		$id_rak_buku 	= $_POST['id_rak_buku'];
		$no_buku = $_POST['no_buku'];
		$tahun = $_POST['tahun'];
		$pengarang 	= $_POST['pengarang'];
		$judul 	= $_POST['judul'];
		$kota 	= $_POST['kota'];
		$penerbit = $_POST['penerbit'];
		$tahun_terbit = $_POST['tahun_terbit'];
		$jumlah = $_POST['jumlah'];
		$isi_ringkas = $_POST['isi_ringkas'];

		if ($_FILES["file_name"]["name"] == "") {

			$result = mysqli_query($mysqli, "UPDATE tb_buku SET
											id_kategori = '$id_kategori',
											id_rak_buku = '$id_rak_buku', 
											no_buku = '$no_buku', 
											tahun = '$tahun', 
											pengarang = '$pengarang', 
											judul = '$judul', 
											kota = '$kota', 
											id_penerbit = '$penerbit',
											tahun_terbit = '$tahun_terbit',
											jumlah = '$jumlah',
											isi_ringkas = '$isi_ringkas'  WHERE id = $ID"); 

		} else {

			$type	       = $_FILES["file_name"]["type"];
		  	$namaFile      = "file-".date('Y-m-d H-i-s')."-cover.jpg";
			$namaSementara = $_FILES['file_name']['tmp_name'];
			$size          = $_FILES['file_name']['size'];
			$dirUpload     = "assets/cover/";
			move_uploaded_file($namaSementara, $dirUpload.$namaFile);
			$result = mysqli_query($mysqli, "UPDATE tb_buku SET
											id_kategori = '$id_kategori', 
											id_rak_buku = '$id_rak_buku', 
											no_buku = '$no_buku', 
											tahun = '$tahun', 
											pengarang = '$pengarang', 
											judul = '$judul', 
											kota = '$kota', 
											id_penerbit = '$penerbit',
											tahun_terbit = '$tahun_terbit',
											jumlah = '$jumlah',
											isi_ringkas = '$isi_ringkas',
											file_name = 'assets/cover/$namaFile' WHERE id = $ID"); 
		}

		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "data-buku" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM tb_buku WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "pinjam-buku" && $action == "cek")
	{

		  $ID = $_POST['id'];

				  $result = mysqli_query($mysqli, "SELECT COUNT(id_anggota) AS total FROM tb_pinjam a LEFT JOIN tb_buku b ON a.id_buku = b.id  WHERE id_anggota = 3 AND b.judul IS NOT NULL") or die(mysqli_error($mysqli));
				$data = mysqli_fetch_array($result);

				if ($data['total'] >= 5) {
					echo "error";
				} else {
					echo "success";
				}
				

	}

	/* DATA SISWA */
	if($page == "data-siswa" && $action == "insert")
	{	
		$nama = $_POST['nama'];
		$nim = $_POST['nim'];
		$jkel = $_POST['jkel'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];
		$status = $_POST['status'];
		$page = $_POST['page'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$email = $_POST['email'];

		if (isset($_POST['kelas'])) {
			$kelas = $_POST['kelas'];
			$result = mysqli_query($mysqli, "INSERT INTO tb_users SET
										   nama = '$nama',
										   nisn = '$nim',
										   jkel = '$jkel',
										   alamat = '$alamat',
										   no_telp = '$no_telp',
										   kelas = '$kelas',
										   username = '$username',
										   password = '$password',
										   email = '$email',
										   status_anggota = '$status',
										   status = 1") or die (mysqli_error($mysqli)); 
		} else {
			$result = mysqli_query($mysqli, "INSERT INTO tb_users SET
										   nama = '$nama',
										   nisn = '$nim',
										   jkel = '$jkel',
										   alamat = '$alamat',
										   no_telp = '$no_telp',
										   username = '$username',
										   password = '$password',
										   email = '$email',
										   status_anggota = '$status',
										   status = 1") or die (mysqli_error($mysqli)); 
		}

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "data-siswa-new" && $action == "insert")
	{	
		$nama = $_POST['nama'];
		$nim = $_POST['nim'];
		$jkel = $_POST['jkel'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];
		$status = $_POST['status'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$email = $_POST['email'];

		if (isset($_POST['kelas'])) {
			$kelas = $_POST['kelas'];
			$result = mysqli_query($mysqli, "INSERT INTO tb_users SET
										   nama = '$nama',
										   nisn = '$nim',
										   jkel = '$jkel',
										   alamat = '$alamat',
										   no_telp = '$no_telp',
										   kelas = '$kelas',
										   username = '$username',
										   password = '$password',
										   email = '$email',
										   status_anggota = '$status',
										   status = 0") or die (mysqli_error($mysqli)); 
		} else {
			$result = mysqli_query($mysqli, "INSERT INTO tb_users SET
										   nama = '$nama',
										   nisn = '$nim',
										   jkel = '$jkel',
										   alamat = '$alamat',
										   no_telp = '$no_telp',
										   username = '$username',
										   password = '$password',
										   email = '$email',
										   status_anggota = '$status',
										   status = 0") or die (mysqli_error($mysqli)); 
		}

		  if($result){ 
		      echo 'success';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "akun-siswa" && $action == "update")
	{	
		$ID = $_POST['id'];
		$username = $_POST['username'];
		
		if (isset($_POST['password'])) {
			$password = md5($_POST['password']);
			$result = mysqli_query($mysqli, "UPDATE tb_users SET
														username = '$username',
														password = '$password'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));
		} else {
			$result = mysqli_query($mysqli, "UPDATE tb_users SET
														username = '$username'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));
		}
		
		  if($result){ 
			echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=data-siswa" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "data-siswa" && $action == "update")
	{

		  $ID = $_POST['id'];
		  $nama = $_POST['nama'];
		 $nim = $_POST['nim'];
		 $jkel = $_POST['jkel'];
		 $alamat = $_POST['alamat'];
		 $no_telp = $_POST['no_telp'];
		 $status = $_POST['status'];
		$page = $_POST['page'];

		if (isset($_POST['kelas'])) {
			$kelas = $_POST['kelas'];
			$result = mysqli_query($mysqli, "UPDATE tb_users SET
														nama = '$nama',
														nisn = '$nim',
														jkel = '$jkel',
														alamat = '$alamat',
														no_telp = '$no_telp',
														kelas = '$kelas',
														status_anggota = '$status'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));
		}else {
			$result = mysqli_query($mysqli, "UPDATE tb_users SET
														nama = '$nama',
														nisn = '$nim',
														jkel = '$jkel',
														alamat = '$alamat',
														no_telp = '$no_telp',
														status_anggota = '$status'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));
		}

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "data-siswa" && $action == "delete")
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

	/*PEMINJAMAN BUKU*/
	if($page == "pinjam-buku" && $action == "insert")
	{

		$id_anggota = $_POST['id_anggota'];
		$id_buku = $_POST['id_buku'];
		$tgl_pinjam = $_POST['tgl_pinjam'];
		$tgl_kembali = $_POST['tgl_kembali'];
		
		$page 		= $_POST['page'];
		$result = mysqli_query($mysqli, "INSERT INTO tb_pinjam SET
											id_anggota = '$id_anggota',
											id_buku = '$id_buku',
											tgl_pinjam = '$tgl_pinjam',
											tgl_kembali = '$tgl_kembali'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "pinjam-buku" && $action == "update")
	{

		$ID = $_POST['id_pinjam'];
	    $page1 = $_POST['page1'];
	    $id_anggota = $_POST['id_anggota'];
		$id_buku = $_POST['id_buku'];
		$tgl_pinjam = $_POST['tgl_pinjam'];
		$tgl_kembali = $_POST['tgl_kembali'];
		$status = $_POST['status'];
		$keterangan = $_POST['keterangan'];
		$tgl_real = $_POST['tgl_real'];


				  $result = mysqli_query($mysqli, "UPDATE tb_pinjam SET
														id_anggota = '$id_anggota',
														id_buku = '$id_buku',
														tgl_pinjam = '$tgl_pinjam',
														tgl_kembali = '$tgl_kembali',
														status = '$status',
					  									keterangan = '$keterangan',
					  									tgl_real = '$tgl_real'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "pengembalian-buku" && $action == "update")
	{

		$ID = $_POST['id_pinjam'];
	    $page1 = $_POST['page1'];
	    $id_anggota = $_POST['id_anggota'];
		$id_buku = $_POST['id_buku'];
		$tgl_pinjam = $_POST['tgl_pinjam'];
		$tgl_kembali = $_POST['tgl_kembali'];
		$status = $_POST['status'];
		$keterangan = $_POST['keterangan'];
		$tgl_real = $_POST['tgl_real'];


				  $result = mysqli_query($mysqli, "UPDATE tb_riwayat_pinjam SET
														id_anggota = '$id_anggota',
														id_buku = '$id_buku',
														tgl_pinjam = '$tgl_pinjam',
														tgl_kembali = '$tgl_kembali',
														status = '$status',
					  									keterangan = '$keterangan',
					  									tgl_real = '$tgl_real'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "pinjam-buku" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM tb_pinjam WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "pinjam-buku" && $action == "status")
	{

		  $ID = $_POST['id_pinjam'];
		  $page1 = $_POST['page1'];
		  $status = $_POST['status'];
		  $denda = $_POST['denda'];
		  if ($denda == 0) {
			$keterangan = $_POST['keterangan'];
		  } else {
			$keterangan = $_POST['keterangan']."<br> Denda : ".$denda;
		  }
		  $tgl_real = date("Y-m-d");


				  $result = mysqli_query($mysqli, "UPDATE tb_pinjam SET
				  									status = '$status',
				  									keterangan = '$keterangan',
				  									tgl_real = '$tgl_real'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}

	if($page == "kembali-buku" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM tb_riwayat_pinjam WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
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