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
		<html lang="en">
		  <head>
		    <meta charset="utf-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <meta name="description" content="">
		    <meta name="author" content="Dashboard">
		    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

		    <title>Login Page Admin OKIF</title>

		    <!-- Bootstrap core CSS -->
		    <link href="'.root.'assets/css/bootstrap.css" rel="stylesheet">
		    <!--external css-->
		    <link href="'.root.'assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		        
		    <!-- Custom styles for this template -->
		    <link href="'.root.'assets/css/style.css" rel="stylesheet">
		    <link href="'.root.'assets/css/style-responsive.css" rel="stylesheet">

		    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		    <!--[if lt IE 9]>
		      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		    <![endif]-->

		  </head>

  <body>


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
					$pas 	  = empty($_POST['password'])?'':filter_var($_POST['password'], 						FILTER_SANITIZE_STRING);
					$username = filter_var($uss,FILTER_SANITIZE_STRING);
					$username = filter_var($uss,FILTER_SANITIZE_MAGIC_QUOTES);
					$pass 	  = filter_var(md5(md5(md5($pas))),FILTER_SANITIZE_MAGIC_QUOTES);

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
							$_SESSION['foto'] = $data['foto'];
							
							$_SESSION['login'] = 1;
							$libs->timer();
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
		echo'
		<!-- js placed at the end of the document so the pages load faster -->
    <script src="'.root.'assets/js/jquery.js"></script>
    <script src="'.root.'assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="'.root.'assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("'.root.'assets/img/login-bg.jpg", {speed: 500});
    </script>
    </body>
    </html>

		';
		
	
	
?>



