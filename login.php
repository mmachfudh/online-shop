<div id="container-user-akses">
	<form action="<?= BASE_URL."proses_login.php";?>" method="POST">
		<?php
			$notif  = isset($_GET['notif']) ? $_GET['notif'] : false;

			if($notif=="require"){
				echo "<div class='notif'>Maaf, password yang anda masukkan salah</div>";
			}elseif ($notif=="email") {
				echo "<div class='notif'>Maaf, email anda belum terdaftar</div>";
			}

		?>
		<div class="element-form">
			<label>Email</label>
			<span><input type="text" name="email"></span>
		</div>


		<div class="element-form">
			<label>Password</label>
			<span><input type="password" name="password"></span>
		</div>			

		<div class="element-form">
			<span><input type="submit" value="Login"></span>
		</div>
		
	</form>
</div>