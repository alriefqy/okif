<?php 


	$url = isset($_GET['p']) ? $_GET['p'] : null;
	$url = rtrim($url, '/');
	//fungsi untuk memfilter valiaber (variabel yg ingin difilter, pilihan mau di filter secara apa variabel tersebut ) . untuk menghapus karakter yang tidak diinginkan di url contoh ' + % 
	$url = filter_var($url, FILTER_SANITIZE_URL);
	$url = explode('/', $url);

	//config dasar 
	$model = $url[0];
	$method = !empty($url[1])?$url[1]:'';
	$parameter = !empty($url[2])?$url[2]:null;

?>