<?php 

	include_once("function/koneksi.php");
	include_once("function/helper.php");

	// Mengambil email dan password dari method POST

	$email = $_POST['email'];
	$password = $_POST['password'];

	// Query data berdasarkan email yang dimasukkan
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND status='on'");

	//  Cek apakah email terdaftar
	if (mysqli_num_rows($query)==0) {
		// dikembalikan ke page login dengan memberikan notif
		header("location:".BASE_URL."index.php?page=login&notif=email");
	}else{
		// mengambil row data dalam bentuk array
		$row = mysqli_fetch_assoc($query);

		// cek apakah password yang dimasukkan benar
		if(password_verify($password, $row['password'])){
			echo "Password benar";
			// Session
			session_start();
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['level'] = $row['level'];

			header("location:".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");

		}else{
		// Jika salah dikembalikan ke menu login dan diberi notif password salah
			header("location:".BASE_URL."index.php?page=login&notif=require");
		}		
	}
