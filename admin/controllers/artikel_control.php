<?php

session_start();
date_default_timezone_set('Asia/Makassar');
require('../../models/load_class.php');
require('../../libs/path.php');
ob_start();

$model = $_GET['model'];
$method = $_GET['method'];
$model;
date_default_timezone_get('Asia/Makassar');

if ($model = 'artikel' AND $method = 'add')
{

	if(isset($_POST['submit']))
	{
		$id_acak = '1'.date('Hi').mt_rand(100,999);
		$title = $_POST['title'];
		$content = $_POST['content'];
		$foto = "ORIGINAL.PNG";
		if ($_FILES['foto']['tmp_name'] != "")
		{
			$foto = $libs->uploadImageToFolder('../../asset/artikel/', $_FILES['foto']);
		}
		$date = date('m/d/20y h:i:sa' , time());
		$author = $_POST['author'];
		$artikel->addArtikel($id_acak,$title,$content,$foto,$date,$author);
		header('Location:'.adm.'artikel');
		
	}


	
	if ($model = 'artikel' AND $method = 'edit')
	{

		if(isset($_POST['edit']))
		{
			//echo '<script>alert("Edit")</script>';
			$id_acak = '1'.date('Hi').mt_rand(100,999);
			$id = $_POST['id'];
			$title = $_POST['title'];
			$content = $_POST['content'];
			$foto = $_POST['foto'];
			if ($_FILES['foto']['tmp_name'] != "")
			{
				$libs->deleteFile('../../asset/artikel/',$foto);
				$foto = $libs->uploadImageToFolder('../../asset/artikel/', $_FILES['foto'],$id_acak);
			}
			$date = date('m/d/20y h:i:sa' , time());
			$author = $_POST['author'];
			$artikel->editArtikel($id,$title,$content,$foto,$date,$author);
			header('Location:'.adm.'artikel');
			
		}
		
		
	}

	if ($model = 'artikel' AND $method = 'delete') 
	{
		//echo "<br><br>work here" ;

		$id = $_GET['id'];

		$data = $artikel->getArtikelById($id);
		foreach ($data as $a)
		{
			$foto = $a['foto'];
			$libs->deleteFile("../../asset/artikel/", $foto);
			$artikel->deleteArtikel($id);
			header("location:".adm."artikel");
		}
			//echo "<br><br>work here" ;

	}
	


}
?>