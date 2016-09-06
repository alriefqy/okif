<?php 
 session_start();
 require('libs/path.php');
 require('../models/load_class.php');
 require('libs/routers.php');
 if (!isset($_SESSION['login'])) {
 			header('location:'.adm.'login');
 		}
 echo '
 		<!DOCTYPE html>
 			<html>
 				<head>
 					<title>Admin</title>
 				</head>
 
 				<body>
 						<a href="'.adm.'login/logout.php">Logout</a> 
 						
 						';
 						if ($_SESSION['level'] == 'admin')
 						{
 							echo'
 							<a href="'.adm.'user">User</a>
 							';
 						}
 
 						echo'
 						
 						<hr>
 						';
 
 						switch($model)
 						{
 							case'':
 								include 'views/home.php';
 							break;
 							default:
 								include 'views/home.php';
 							break;
 
 
 						}
 
 ?> 