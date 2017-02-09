<?php 
require_once('db.php');
//dependency injection->pelajari

function autoload($class)
{
	$namafile = $class.'.php';
	include_once $namafile;
}
	spl_autoload_register('autoload');//menginclude semua class di folder yang sama

	try 
	{
		$user = new user_model($db);
		$pengurus = new pengurus_model($db);
		$pi = new pengurus_model($db);
		$libs = new libs_model($db);
		$artikel = new artikel_model($db);
		$informasi = new informasi_model($db);
		$akun = new user_model($db);
		$mahasiswa = new mahasiswa_model($db);
		$alumni = new mahasiswa_model($db);
		$ketua = new ketua_model($db);
		$dewan = new dewan_model($db);
		$headline = new headline_model($db);
		
	} 
	catch (Exception $e) 
	{
		echo "Error".$e->getMessage()."\n";
	}

	?>