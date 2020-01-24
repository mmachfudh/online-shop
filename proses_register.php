<?php
	
	include_once("function/koneksi.php");
	include_once("function/helper.php");

	// Mengambil variabel dari form dengan method POST
	$nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];
	$re_password = $_POST['re_password'];
	$level = "customer";
	$status = "on";

	// Menghapus password dan repassword
	unset($_POST['password']);
	unset($_POST['re_password']);

	// Merubah semua variabel POST menjadi data pada url
	$dataForm = http_build_query($_POST);

	// query email pada database
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");

	// Cek apakah form sudah di isi semua
	if(empty($nama_lengkap) || empty($email) || empty($phone) || empty($alamat) || empty($password)){
		header("location:".BASE_URL."index.php?page=register&notif=require&$dataForm");
	// Validasi password
	}elseif ($password!=$re_password) {
		header("location:".BASE_URL."index.php?page=register&notif=password&$dataForm");
	// Cek apakah email sudah terdaaftar
	}elseif (mysqli_num_rows($query) == 1) {
		header("location:".BASE_URL."index.php?page=register&notif=email&$dataForm");
	// Memasukkan data pada database
	}else{
		$password = password_hash($password, PASSWORD_DEFAULT);
		mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone ,password, status) VALUES ('$level', '$nama_lengkap', '$email', '$alamat', '$phone', '$password','$status')");
		header("location:".BASE_URL."index.php?page=login");		
	}
