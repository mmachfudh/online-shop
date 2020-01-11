<?php

	define("BASE_URL","http://localhost:8080/online-shop/");

	function rupiah($nilai){
		return "Rp ".number_format($nilai,2,",",".");
	}

?>