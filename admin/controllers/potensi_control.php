<?php

session_start();
date_default_timezone_set('Asia/Makassar');
require('../../models/load_class.php');
require('../../libs/path.php');
ob_start();

$model = $_GET['model'];
$method = $_GET['method'];
$model;
if ($model = 'potensi' AND $method = 'add')
{

	if(isset($_POST['submit']))
	{
		//$id_acak = '1'.date('Hi').mt_rand(100,999);
		$title = $_POST['title'];
		$content = $_POST['content'];
		$foto = "";
		if ($_FILES['foto']['tmp_name'] != "")
		{
			$foto = $libs->uploadImageToFolder('../../asset/potensi/', $_FILES['foto']);
		}

		$potensi->add_potensi($title,$content,$foto);
		header('Location:'.adm.'potensi');
		
	}


	if ($model = 'potensi' AND $method = 'edit')
	{

		if(isset($_POST['edit']))
		{
			//echo '<script>alert("Edit")</script>';
			//$id_acak = '1'.date('Hi').mt_rand(100,999);
			$id = $_POST['id'];
			$title = $_POST['title'];
			$content = $_POST['content'];
			$foto = $_POST['foto'];
			if ($_FILES['foto']['tmp_name'] != "")
			{
				$libs->deleteFile('../../asset/potensi/',$foto);
				$foto = $libs->uploadFile('../../asset/potensi/', $_FILES['foto'],$id);
			}

			$potensi->update_potensi($id,$title,$content,$foto);
			header('Location:'.adm.'potensi');
			
		}
		
		
	}

	if ($model = 'potensi' AND $method = 'delete') 
	{
		//echo "<br><br>work here" ;
			
			$id = $_GET['id'];
			
			$data = $potensi->getPotensiById($id);
			//echo "<br><br>work here" ;
			$libs->deleteFile("../../assets/images/", $data['foto']);
			$potensi->delete_potensi($id);
			header("location:".adm."potensi");
	}
	


}
?>