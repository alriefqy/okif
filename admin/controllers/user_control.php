<?php

session_start();
date_default_timezone_set('Asia/Makassar');
require('../../models/load_class.php');
require('../../libs/path.php');
ob_start();

$model = $_GET['model'];
$method = $_GET['method'];
$model;
if ($model = 'user' AND $method = 'add')
{

	if(isset($_POST['submit']))
	{
		$id = '1'.date('Hi').mt_rand(100,999);
		$user = $_POST['user'];
		$password = md5(md5(md5($_POST['password'])));
		$name = $_POST['name'];
		$level = $_POST['level'];
		$foto = "ORIGINAL.PNG";
		$akun->addUser($id,$user,$password,$name,$level,$foto);
		header('Location:'.adm.'user');
		
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

	if ($model = 'user' AND $method = 'delete') 
	{
		//echo "<br><br>work here" ;
			
			$id = $_GET['id'];
			
			$data = $user->getUserById($id);
			//echo "<br><br>work here" ;
			$libs->deleteFile("../../assets/user/", $data['foto']);
			$user->deleteUser($id);
			header("location:".adm."user");
	}
	


}
?>