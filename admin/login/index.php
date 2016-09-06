<?php
require('../../models/load_class.php');
		// include('libs/path.php');
require('../../libs/path.php');
require('../../libs/routers.php');

@session_start();
		session_unset();
		session_destroy();
	echo'
	<!DOCTYPE html>

	<html>
		<head>
			<title>Simple CMS</title>
			<link rel="stylesheet" href=" '.root.'assets/style.css" type="text/css">
			<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
 			 <script>tinymce.init({selector:"textarea" });
 			 </script>
		</head>
	
		<body>
		<div class="container">
			<div class="navbar">	
				
			</div>
				<hr>
	
	';
	switch ($method) {
		case '':
			include ('../views/login.php');
			break;
		
		default:
			include ('../views/login.php');
			break;
	}
	echo'
		<a href="'.root.'register">Register</a>	';
			if (isset($_POST['submit'])) 
		{
			
			
					//session_start();
					
					$uss = empty($_POST['user'])?'':htmlentities($_POST['user'],ENT_QUOTES,'utf-8');
					$pas 	  = empty($_POST['password'])?'':filter_var($_POST['password'], FILTER_SANITIZE_STRING);
					$username = filter_var($uss,FILTER_SANITIZE_STRING);
					$username = filter_var($uss,FILTER_SANITIZE_MAGIC_QUOTES);
					$pass 	  = filter_var($pas,FILTER_SANITIZE_MAGIC_QUOTES);

					$data = $user->getUserByUserName($username);

					$count = 0;
					if ($pass == $data['password']) 
					{
						$count = $count = $user->authUser($username);
						if($count > 0)
						{
							@session_start();

									
							$_SESSION['user'] = $data['user'];
							$_SESSION['name'] = $data['name'];
							$_SESSION['id'] = $data['id'];
							$_SESSION['level'] = $data['level'];
							$_SESSION['login'] = 1;


							$sid_lama = session_id();
							session_regenerate_id();
							$sid_baru = session_id();
							$user->setSession($username,$sid_baru);
							header("location:".adm);

						}
					}

					else 
					{
						echo'salah';
					}
				}
				//else
				//{
				//	header('location:'.ROOT);
				//}	
		
		
	
	
?>



