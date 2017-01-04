<?php 
require('libs/routers.php');
include('libs/path.php');
require('models/load_class.php');

echo'
	<html>
		<head>
			<title>Okif</title>
		</head>
	
	<body>
		<a href="'.root.'">Home</a>
		<a href="'.root.'pengurus">Pengurus</a>
		<a href="'.root.'admin">Admin Login</a>
		<a href="'.root.'artikel">Artikel</a>		
		<hr>

';
	switch($model)
	{
		default:
			include 'views/home.php';
		break;
		case '':
			include 'views/home.php';
		break;
		case 'pengurus':
			include 'views/pengurus.php';
		break;
		case 'artikel':
			if ($model == 'artikel' AND $method == '')
				{include 'views/artikel.php';}
			else if($model == 'artikel' AND $method == 'read')
				{include 'views/read.php';}
			else
				{echo '404';}

		break;
		
		//case 'read':
		//	include 'views/read.php';
		//break;

		

		

	}
?>

