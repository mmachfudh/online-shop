<?php

	define("BASE_URL","http://localhost/online-shop/");

	function rupiah($nilai){
		return "Rp ".number_format($nilai,2,",",".");
	}

?>