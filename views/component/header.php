<?php
echo '
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="Portal Organisasi Kemahasiswaan Informatika">
	<meta name="keywords" content="informatika, unhas, teknik, okif">
	<meta name="author" content="HMIF FT-UH, Riefqy, Jo">
	
	<title>Beranda | Organisasi Kemahasiswaan Informatika Fakultas Teknik Universitas Hasanuddin</title>
	<link rel="shortcut icon" type="image/icon" href="assets/images/favico.ico"/>
	<link href="'.root.'assets/css/font-awesome.css" rel="stylesheet">
	<link href="'.root.'assets/css/bootstrap.css" rel="stylesheet">    
	<link rel="stylesheet" type="text/css" href="'.root.'assets/css/slick.css"/> 
	<link rel="stylesheet" href="'.root.'assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
	<link rel="stylesheet" type="text/css" href="'.root.'assets/css/animate.css"/> 
	<link rel="stylesheet" type="text/css" href="'.root.'assets/css/bootstrap-progressbar-3.3.4.css"/> 
	<link id="switcher" href="'.root.'assets/css/theme-color/okif-theme.css" rel="stylesheet">

	<link href="'.root.'assets/css/style.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">    
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--	 WARNING: Respond.js does not work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<!-- PRELOADER -->
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	<!-- END PRELOADER -->

	<!-- SCROLL TOP BUTTON -->
	<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
	<!-- END SCROLL TOP BUTTON -->

	<!-- Start header -->
	<header id="header">
		<!-- header top search -->
		<div class="header-top">
			<div class="container">
				<form action="">
					<div id="search">
						<input type="text" placeholder="Search okif-ftuh.org" name="s" id="m_search" style="display: inline-block;">
						<button type="submit">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
		<!-- header bottom -->
		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="header-contact">
							<ul>
								<li>
									<div class="mail">
										<i class="fa fa-envelope"></i>
										okifftuh@gmail.com
									</div>
								</li>
								<li>
									<div class="mail">
										<i class="fa fa-home"></i>
										1F Classroom Building FT-UH Gowa
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div class="header-login">
							<a class="login modal-form" data-target="#login-form" data-toggle="modal" href="#">Login</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- End header -->

	<!-- Start login modal window -->
	<div aria-hidden="false" role="dialog" tabindex="-1" id="login-form" class="modal leread-modal fade in">
		<div class="modal-dialog">
			<!-- Start login section -->
			<div id="login-content" class="modal-content">
				<div class="modal-header">
					<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title"><i class="fa fa-unlock-alt"></i>Login</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<input type="text" placeholder="User name" class="form-control">
						</div>
						<div class="form-group">
							<input type="password" placeholder="Password" class="form-control">
						</div>
						<div class="loginbox">
							<label><input type="checkbox"><span>Remember me</span></label>
							<button class="btn signin-btn" type="button">SIGN IN</button>
						</div>                    
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End login modal window -->

	<!-- BEGIN MENU -->
	<section id="menu-area">      
		<nav class="navbar navbar-default" role="navigation">  
			<div class="container">
				<div class="navbar-header">
					<!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- LOGO -->              
					<!-- TEXT BASED LOGO -->
					<a class="navbar-brand" href="'.root.'">
						OKIF <span class="normal-color">FT-UH</span>
					</a>              
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
						<li><a href="'.root.'">Beranda</a></li>
						<li><a href="'.root.'about">Tentang</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Struktur <span class="fa fa-angle-down"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="'.root.'pengurus">HMIF FT-UH 2016/2017</a></li>
								<li><a href="'.root.'dewan">DMMIF FT-UH 2016/2017</a></li>                
							</ul>
						</li>             
						<li><a href="'.root.'informasi">Seputar OKIF FT-UH</a></li>
						<li><a href="'.root.'artikel">IT Info</a></li>
						<li><a href="form.php">Form</a></li>
					</ul>                     
				</div><!--/.nav-collapse -->
				<a href="#" id="search-icon">
					<i class="fa fa-search">            
					</i>
				</a>
			</div>     
		</nav>
	</section>
	<!-- END MENU --> 


	';
	?>