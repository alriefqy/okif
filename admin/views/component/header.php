<?php
echo'
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>Dashboard OKIF FT-UH</title>
  <link rel="shortcut icon" type="image/icon" href="'.adm.'assets/img/original.png"/>
  <!-- Bootstrap core CSS -->
  <link href="'.adm.'assets/css/bootstrap.css" rel="stylesheet">
  <!--external css-->
  <link href="'.adm.'assets/datatables/css/bootstrap.min.css" rel="stylesheet">
  <link href="'.adm.'assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="'.adm.'assets/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="'.adm.'assets/js/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="'.adm.'assets/lineicons/style.css">  
  <link href="'.root.'assets/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="'.root.'assets/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
  

  <!-- Custom styles for this template -->
  <link href="'.adm.'assets/css/style.css" rel="stylesheet">
  <link href="'.adm.'assets/css/style-responsive.css" rel="stylesheet">

  <script src="'.adm.'assets/js/chart-master/Chart.js"></script>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

  <section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="'.adm.'" class="logo"><b>ADMIN PANEL OKIF</b></a>
      <!--logo end-->

      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" target="_blank" href="'.root.'">Your Website</a></li>
          <li><a class="logout" href="'.adm.'login/logout.php">logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->



  </section>



</body>
</html>
';
?>