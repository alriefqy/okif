<?php 
require('libs/path.php');
require('models/load_class.php');
require('libs/routers.php');


require('views/component/header.php');

	switch($model)
	{
		case '':
			include 'views/home.php';
		break;
		case 'pengurus':
			include 'views/pengurus.php';
		break;
		case 'dewan':
			include 'views/dewan.php';
		break;
		case 'informasi':
			if ($model == 'informasi' AND $method == '')
			{include 'views/informasi.php';}
			else if($model == 'informasi' AND $method == 'read')
				{include 'views/read_informasi.php';}
		break;
		case 'artikel':
			if ($model == 'artikel' AND $method == '')
				{include 'views/artikel.php';}
			else if($model == 'artikel' AND $method == 'read')
				{include 'views/read.php';}
			else
				{echo '404';}
		break;
		case 'about':
			include 'views/tentang.php';
		break; 

		default:
			include 'views/home.php';
		break;

		//case 'read':
		//	include 'views/read.php';
		//break;
		

	}
require ('views/component/footer.php');
	
?>
	
	

