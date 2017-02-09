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

if ($model = 'informasi' AND $method = 'add')
{

	if(isset($_POST['submit']))
	{
		$id_acak = '1'.date('Hi').mt_rand(100,999);
		$kegiatan = $_POST['kegiatan'];
		$waktu = date('Y-m-d');
		$content = $_POST['content'];
		$foto = "";
		if ($_FILES['foto']['tmp_name'] != "")
		{
			$foto = $libs->uploadImageToFolder('../../asset/galeri/', $_FILES['foto']);
		}
		
		$informasi->addInformasi($id_acak,$kegiatan,$waktu,$content,$foto);
		header('Location:'.adm.'informasi');
		
	}


	
	if ($model = 'informasi' AND $method = 'edit')
	{

		if(isset($_POST['edit']))
		{
			//echo '<script>alert("Edit")</script>';
			$id_acak = '1'.date('Hi').mt_rand(100,999);
			$id = $_POST['id'];
			$kegiatan = $_POST['kegiatan'];
			$waktu = date('Y-m-d');
			$content = $_POST['content'];
			$foto = $_POST['foto'];
			if ($_FILES['foto']['tmp_name'] != "")
			{
				$libs->deleteFile('../../asset/galeri/',$foto);
				$foto = $libs->uploadImageToFolder('../../asset/galeri/', $_FILES['foto'],$id_acak);
			}
			
			$informasi->editInformasi($id,$kegiatan,$waktu,$content,$foto);
			header('Location:'.adm.'informasi');
			
		}
		
		
	}

	if ($model = 'informasi' AND $method = 'delete') 
	{
		//echo "<br><br>work here" ;

		$id = $_GET['id'];

		$data = $informasi->getInformasiById($id);
		foreach ($data as $a)
		{
			$foto = $a['foto'];
			$libs->deleteFile("../../asset/galeri/", $foto);
			$informasi->deleteInformasi($id);
			header("location:".adm."informasi");
		}
			//echo "<br><br>work here" ;

	}
	


}
?>