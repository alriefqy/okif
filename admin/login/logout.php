<?php
define('adm','http://localhost/okif/admin/');

	session_start();
	session_unset();
	session_destroy();
	header('location:'.adm);	
?>