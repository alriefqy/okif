<?php

session_start();
date_default_timezone_set('Asia/Makassar');
require('../../models/load_class.php');
require('../../libs/path.php');
ob_start();

$model = $_GET['model'];
$method = $_GET['method'];
$model;
if ($model = 'berita' AND $method = 'add')
{

	if(isset($_POST['submit']))
	{
		//$id_acak = '1'.date('Hi').mt_rand(100,999);
		$title = $_POST['title'];
		$content = $_POST['content'];
		$foto = "";
		if ($_FILES['foto']['tmp_name'] != "")
		{
			$foto = $libs->uploadImageToFolder('../../asset/berita/', $_FILES['foto']);
		}

		$berita->addArtikel($title,$content,$foto);
		header('Location:'.adm.'berita');
		
	}


	
	if ($model = 'berita' AND $method = 'edit')
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
				$libs->deleteFile('../../asset/berita/',$foto);
				$foto = $libs->uploadFile('../../asset/berita/', $_FILES['foto'],$id);
			}

			$berita->update_artikel($id,$title,$content,$foto);
			header('Location:'.adm.'berita');
			
		}
		
		
	}

	if ($model = 'berita' AND $method = 'delete') 
	{
		//echo "<br><br>work here" ;
			
			$id = $_GET['id'];
			
			$data = $berita->getArticleById($id);
			//echo "<br><br>work here" ;
			$libs->deleteFile("../../assets/berita/", $data['foto']);
			$berita->delete_artikel($id);
			header("location:".adm."berita");
	}
	


}
?>