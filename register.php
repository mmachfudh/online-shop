<?php
	// mem proteksi halaman register
	if($user_id){
		header("location:".BASE_URL);
	}

 ?>

<div id="container-user-akses">
	<form action="<?= BASE_URL."proses_register.php";?>" method="POST">
		<!-- Cek apakah variabel memiliki nilai -->
		<?php
			$notif  = isset($_GET['notif']) ? $_GET['notif'] : false;
			$nama_lengkap  = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
			$email  = isset($_GET['email']) ? $_GET['email'] : false;
			$phone  = isset($_GET['phone']) ? $_GET['phone'] : false;
			$alamat  = isset($_GET['alamat']) ? $_GET['alamat'] : false;

		// Notifikasi form belum lengkap
			if($notif=="require"){
				echo "<div class='notif'>Maaf, Kamu harus melengkapi form dibawah ini</div>";
		// Notifikasi password tidak cocok
			}elseif ($notif=="password") {
				echo "<div class='notif'>Maaf, password yang anda masukkan tidak sama</div>";
		// Notifikasi email sudah terdaftar
			}elseif ($notif=="email") {
				echo "<div class='notif'>Maaf, email yang anda masukkan sudah terdaftar</div>";
			} 
		?>
		<div class="element-form">
			<label>Nama Lengkap</label>
			<span><input type="text" name="nama_lengkap" value="<?= $nama_lengkap;?>"></span>
		</div>

		<div class="element-form">
			<label>Email</label>
			<span><input type="text" name="email" value="<?= $email;?>"></span>
		</div>		


		<div class="element-form">
			<label>Nomor Telephone / Handphone</label>
			<span><input type="text" name="phone" value="<?= $phone;?>"></span>
		</div>		

		<div class="element-form">
			<label>Alamat</label>
			<span><textarea name="alamat"><?= $alamat;?></textarea> </span>
		</div>

		<div class="element-form">
			<label>Password</label>
			<span><input type="password" name="password"></span>
		</div>		

		<div class="element-form">
			<label>Re-type Password</label>
			<span><input type="password" name="re_password"></span>
		</div>		

		<div class="element-form">
			<span><input type="submit" value="register"></span>
		</div>
		
	</form>
</div>