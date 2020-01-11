<?php

	$server 	="localhost";
	$username	="root";
	$password	="";
	$database	="online-shop";

	// Membuat koneksi ke database
	$koneksi = mysqli_connect($server, $username, $password, $database) or die("Koneksi ke database gagal");