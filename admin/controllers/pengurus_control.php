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
if ($model = 'pengurus' AND $method = 'add')
{

	if(isset($_POST['submit']))
	{
		$id_acak = '1'.date('Hi').mt_rand(100,999);
		$name = $_POST['name'];
		$jabatan = $_POST['jabatan'];
		$periode = $_POST['periode'];

		$status = $_POST['kompartemen'];
		$foto = "";
		if ($_FILES['foto']['tmp_name'] != "")
		{
			$foto = $libs->uploadFile('../../asset/pengurus/',$_FILES['foto'],$id_acak);
		}
		else
		{
			$foto = 'error';
		}
		$pengurus->addPengurus($id_acak,$name,$jabatan,$periode,$status,$foto);
		
	}


	if ($model = 'pengurus' AND $method = 'edit')
	{
		header('Location:'.adm.'pengurus');

		if(isset($_POST['edit']))
		{
			//echo '<script>alert("Edit")</script>';
			$id_acak = '1'.date('Hi').mt_rand(100,999);
			$id = $_POST['id'];
			$name = $_POST['name'];
			$jabatan = $_POST['jabatan'];
			$periode = $_POST['periode'];
			$status	= $_POST['kompartemen'];
			$foto = $_POST['foto'];
			if ($_FILES['foto']['tmp_name'] != "")
			{
				$libs->deleteFile('../../asset/pengurus/',$foto);
				$foto = $libs->uploadImageToFolder('../../asset/pengurus/',$_FILES['foto'],$id_acak);
			}
			$pengurus->editPengurus($id,$name,$jabatan,$periode,$status,$foto);
			header('Location:'.adm.'pengurus');
		}
		
		
	}

	if ($model = 'pengurus' AND $method = 'delete') 
	{
		//echo "<br><br>work here" ;
			
			$id = $_GET['id'];
			//$data = $pengurus->getPengurusById($id);

			//echo "<br><br>work here" ;
			$data = $pengurus->getPengurusById($id);
			foreach ($data as $data) 
			{
				$foto = $data['foto'];
				//echo $foto;
				$libs->deleteFile('../../asset/pengurus/',$foto);
				$pengurus->deletePengurus($id);
				header("location:".adm."pengurus");
			}
	}
	


}

endif;
?>