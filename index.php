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
		<a href="'.root.'admin">Admin Login</a>
		
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
		

		

	}
?>

