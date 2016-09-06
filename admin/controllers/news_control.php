<?php

session_start();
date_default_timezone_set('Asia/Makassar');
require('../../models/load_class.php');
require('../../libs/path.php');
ob_start();

$model = $_GET['model'];
$method = $_GET['method'];
$model;
if ($model = 'pengumuman' AND $method = 'add')
{

	if(isset($_POST['submit']))
	{
		//$id_acak = '1'.date('Hi').mt_rand(100,999);
		$title = $_POST['title'];
		$content = $_POST['content'];
		$foto = "";
		if ($_FILES['foto']['tmp_name'] != "")
		{
			$foto = $libs->uploadImageToFolder('../../asset/pengumuman/', $_FILES['foto']);
		}

		$pengumuman->addPengumuman($title,$content,$foto);
		header('Location:'.adm.'pengumuman');
		
	}


	if ($model = 'pengumuman' AND $method = 'edit')
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
				$libs->deleteFile('../../asset/pengumuman/',$foto);
				$foto = $libs->uploadFile('../../asset/pengumuman/', $_FILES['foto'],$id);
			}

			$pengumuman->update_pengumuman($id,$title,$content,$foto);
			header('Location:'.adm.'pengumuman');
			
		}
		
		
	}

	if ($model = 'pengumuman' AND $method = 'delete') 
	{
		//echo "<br><br>work here" ;
			
			$id = $_GET['id'];
			
			$data = $pengumuman->getPengumumanById($id);
			//echo "<br><br>work here" ;
			$libs->deleteFile("../../assets/images/", $data['foto']);
			$pengumuman->delete_pengumuman($id);
			header("location:".adm."pengumuman");
	}
	


}
?>