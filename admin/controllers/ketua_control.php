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
if ($model = 'ketua' AND $method = 'add')
{

	if(isset($_POST['submit']))
	{
		$id_acak = '1'.date('Hi').mt_rand(100,999);
		$name = $_POST['name'];
		$jabatan = $_POST['jabatan'];
		$periode = $_POST['periode'];
		$status = $_POST['status'];
		$foto = "";
		if ($_FILES['foto']['tmp_name'] != "")
		{
			$foto = $libs->uploadFile('../../asset/ketua/',$_FILES['foto'],$id_acak);
		}
		else
		{
			$foto = 'error';
		}
		
		$ketua->addKetua($id_acak,$name,$jabatan,$periode,$status,$foto);
		header('Location:'.adm.'ketua');
		
	}


	if ($model = 'ketua' AND $method = 'edit')
	{

		if(isset($_POST['edit']))
		{
			//echo '<script>alert("Edit")</script>';
			$id_acak = '1'.date('Hi').mt_rand(100,999);
			$id = $_POST['id'];
			$name = $_POST['name'];
			$jabatan = $_POST['jabatan'];
			$periode = $_POST['periode'];
			$status = $_POST['status'];
			$foto = $_POST['foto'];
			if ($_FILES['foto']['tmp_name'] != "")
			{
				$libs->deleteFile('../../asset/ketua/',$foto);
				$foto = $libs->uploadImageToFolder('../../asset/ketua/',$_FILES['foto'],$id_acak);
			}
			$ketua->editKetua($id,$name,$jabatan,$periode,$status,$foto);
			header('Location:'.adm.'ketua');
		}
		
		
	}

	if ($model = 'ketua' AND $method = 'delete') 
	{
		//echo "<br><br>work here" ;
			
			$id = $_GET['id'];
			//$data = $pengurus->getPengurusById($id);

			//echo "<br><br>work here" ;
			$data = $ketua->getKetuaById($id);
			foreach ($data as $data) 
			{
				$foto = $data['foto'];
				//echo $foto;
				$libs->deleteFile('../../asset/ketua/',$foto);
				$ketua->deleteKetua($id);
				header("location:".adm."ketua");
			}
	}
	


}

endif;
?>