<?php 

	include_once("function/helper.php");
	$page = isset($_GET['page']) ? $_GET['page'] : false;

	// mengambil variabel dari server menggunakan session
	session_start();

	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Shop</title>
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL."css/style.css";?>">
</head>
<body>
	<div id="container">
		<div id="header">
			<a href="<?= BASE_URL."index.php";?>">
				<img src="<?= BASE_URL."images/logo.png";?>">
			</a>
			<div id="menu">
				<div id="user">
					<a href="<?= BASE_URL."index.php?page=login";?>">Login</a>
					<a href="<?= BASE_URL."index.php?page=register";?>">Register</a>
				</div>
				<a href="<?= BASE_URL."index.php?page=keranjang";?>" id="button-keranjang">
					<img src="<?= BASE_URL."images/cart.png";?>">
				</a>
			</div>
		</div>
		<div id="content">
			<?php

				$filename = "$page.php";
				
				if(file_exists($filename)){
					include_once($filename);
				}else{
					echo "Maaf halaman tidak ditemukan";
				}

			?>
		</div>
		<div id="footer">
			<p>Copyright Onlie Shop 2020</p>
		</div>
	</div>

</body>
</html>