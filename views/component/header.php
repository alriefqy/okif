<?php
switch ($model) 
{
	case '':
	$title = 'Home';
	break;
	case 'about':
	$title = 'About';
	break;
	case 'pengurus':
	$title = 'Pengurus';
	break;
	case 'dewan':
	$title = 'Dewan';
	break;
	case 'informasi':
	$title = 'Informasi';
	break;
	case 'artikel':
	$title = 'Artikel';
	break;
	case 'form':
	$title = 'Form Database';
	break;

	default:
	$title = 'Home';
	break;
}

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
	
	<title>'.$title.' | Organisasi Kemahasiswaan Informatika Fakultas Teknik Universitas Hasanuddin</title>
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
	
	<script>tinymce.init({ selector:"textarea" });</script>
	<![endif]-->
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, "script", "facebook-jssdk"));</script>

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
				<form action="'.root.'result" method="GET">
					<div id="search">
						
						<input class="search_bar" type="text" name="cari" placeholder="Cari Artikel..">
						
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
					
				</div>
			</div>
		</div>
	</header>
	<!-- End header -->

	<!-- Start login modal window -->
	
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
						<li><a href="'.root.'form">Form Database OKIF</a></li>
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