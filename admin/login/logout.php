<?php
define('adm','http://localhost/okif-unhas/admin/');

	session_start();
	session_unset();
	session_destroy();
	header('location:'.adm);	
?>