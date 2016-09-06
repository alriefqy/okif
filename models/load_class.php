<?php 

require_once('db.php');
//dependency injection->pelajari

	function autoload($class)
	{
		$namafile = $class.'.php';
		include_once $namafile;
	}
	spl_autoload_register('autoload');//menginclude semua class di folder yang sama

	try {
		$user = new user_model($db);
		
	} catch (Exception $e) {
		echo "Error".$e->getMessage()."\n";
	}

?>