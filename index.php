<?php 

	include_once("function/helper.php");
	include_once("function/koneksi.php");
	$page = isset($_GET['page']) ? $_GET['page'] : false;
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

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
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL."css/banner.css";?>">
	<script src="<?= BASE_URL."js/ckeditor/ckeditor.js";?>" ></script>

</head>
<body>
	<div id="container">
		<div id="header">
			<a href="<?= BASE_URL."index.php";?>">
				<img src="<?= BASE_URL."images/logo.png";?>">
			</a>
			<div id="menu">
				<div id="user">
					<?php
						if($user_id){
							echo "Hi <b>$nama</b>,
								<a href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
								<a href='".BASE_URL."logout.php'>Logout</a>"
								;
						}else{
							echo "<a href='".BASE_URL."index.php?page=login'>Login</a>";
							echo "<a href='".BASE_URL."index.php?page=register'>Register</a>";
						}
					 ?>
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
					include_once("main.php");
				}

			?>
		</div>
		<div id="footer">
			<p>Copyright Onlie Shop 2020</p>
		</div>
		
	</div>
</body>
	<script src="<?= BASE_URL."js/jquery-3.4.1.min.js";?>" ></script>
	<script src="<?= BASE_URL."js/Slides-SlidesJS-3/source/jquery.slides.min.js";?>" ></script>

	<script>
    $(function() {
      $('#slides').slidesjs({
        height: 350,
        play: {
          auto: true,
          interval: 3000,
        },
		navigation: false
      });
    });
  </script>
</html>