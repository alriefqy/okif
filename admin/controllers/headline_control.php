<?php
	session_start();
	if (isset($_GET['model'])): // for secure
		ob_start();
		date_default_timezone_set('Asia/Makassar');
		
		require "../../models/load_class.php";
		require "../../libs/path.php";

		$model = $_GET['model'];
		$method = $_GET['method'];
		$model;

		if ($model = 'headline' AND $method = 'edit')
	{

		if(isset($_POST['edit']))
		{
			//echo '<script>alert("Edit")</script>';
			$date = date('Y-m-d');
			$id_acak = '1'.date('Hi').mt_rand(100,999);
			$id = $_POST['id'];
			$title = $_POST['title'];
			$content = $_POST['content'];
			$foto = $_POST['foto'];
			if ($_FILES['foto']['tmp_name'] != "")
			{
				$libs->deleteFile('../../asset/headline/',$foto);
				$foto = $libs->uploadImageToFolder('../../asset/headline/', $_FILES['foto'],$id_acak);
			}
			$foto_headline = $_POST['file_headline'];
			if ($_FILES['file']['tmp_name'] != "")
			{
				$libs->deleteFile('../../asset/headline/',$foto_headline);
				$foto_headline = $libs->uploadImageToFolder('../../asset/headline/', $_FILES['file']);
			}
			
			$author = $_POST['author'];
			$headline->updateData($id,$title,$content,$foto,$foto_headline);
			header('Location:'.adm.'headline');
			
		}
		
	}
	if ($model = 'headline' AND $method = 'delete') 
	{
		//echo "<br><br>work here" ;

		$id = $_GET['id'];
		$data = $headline->getDataById($id);
		foreach ($data as $a)
		{
			$foto = $a['foto_headline'];
			$libs->deleteFile("../../asset/headline/", $foto);
			$headline->deleteFoto($id);
			header("location:".adm."headline");
		}
			//echo "<br><br>work here" ;

	}
	endif;
?>
