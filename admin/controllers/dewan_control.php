<?php

session_start();
if(isset($_GET['model'])):
date_default_timezone_set('Asia/Makassar');
require('../../models/load_class.php');
require('../../libs/path.php');
ob_start();

$model = $_GET['model'];
$method = $_GET['method'];
$model;
if ($model = 'dewan' AND $method = 'add')
{

	if(isset($_POST['submit']))
	{
		$id_acak = '1'.date('Hi').mt_rand(100,999);
		$name = $_POST['name'];
		$angkatan = $_POST['angkatan'];
		$periode = $_POST['periode'];
		$foto = "";
		if ($_FILES['foto']['tmp_name'] != "")
		{
			$foto = $libs->uploadFile('../../asset/dewan/',$_FILES['foto'],$id_acak);
		}
		else
		{
			$foto = 'error';
		}
		$dewan->addDewan($id_acak,$name,$angkatan,$periode,$foto);
		header('Location:'.adm.'dewan');
		
	}


	if ($model = 'dewan' AND $method = 'edit')
	{

		if(isset($_POST['edit']))
		{
			//echo '<script>alert("Edit")</script>';
			$id_acak = '1'.date('Hi').mt_rand(100,999);
			$id = $_POST['id'];
			$name = $_POST['name'];
			$angkatan = $_POST['angkatan'];
			$periode = $_POST['periode'];
			$foto = $_POST['foto'];
			if ($_FILES['foto']['tmp_name'] != "")
			{
				$libs->deleteFile('../../asset/dewan/',$foto);
				$foto = $libs->uploadImageToFolder('../../asset/dewan/',$_FILES['foto'],$id_acak);
			}
			$dewan->editDewan($id,$name,$angkatan,$periode,$foto);
			header('Location:'.adm.'dewan');
		}
		
		
	}

	if ($model = 'dewan' AND $method = 'delete') 
	{
		//echo "<br><br>work here" ;
			
			$id = $_GET['id'];
			//$data = $pengurus->getPengurusById($id);

			//echo "<br><br>work here" ;
			$data = $dewan->getDewanById($id);
			foreach ($data as $data) 
			{
				$foto = $data['foto'];
				//echo $foto;
				$libs->deleteFile('../../asset/dewan/',$foto);
				$dewan->deleteDewan($id);
				header("location:".adm."dewan");
			}
	}
	


}

endif;
?>