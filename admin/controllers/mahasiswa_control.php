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
if ($model = 'mahasiswa' AND $method = 'add')
{

	if(isset($_POST['submit']))
	{
		$nim			= $_POST['nim'];
		$nama			= $_POST['name'];
		$tempat			= $_POST['tempat'];
		$tanggallahir	= $_POST['tanggallahir'];
		$agama			= $_POST['agama'];
		$thn_masuk		= $_POST['thn_masuk'];
		$thn_lulus		= $_POST['thn_lulus'];
		$judul_skripsi	= $_POST['judul_skripsi'];
		$prestasi		= $_POST['prestasi'];
		$beasiswa		= $_POST['beasiswa'];
		$alamat			= $_POST['alamat'];
		$no_telp		= $_POST['no_telp'];
		$foto = "";
		if ($_FILES['foto']['tmp_name'] != "")
		{
			$foto = $libs->uploadFile('../../asset/mahasiswa/',$_FILES['foto'],$nim);
		}
		else
		{
			$foto = 'error';
		}
		$mahasiswa->addData($nim,$nama,$tempat,$tanggallahir,$agama,$thn_masuk,$thn_lulus,$judul_skripsi,$prestasi,$beasiswa,$alamat,$no_telp,$foto);
		header('Location:'.adm.'mahasiswa');
		
	}


	if ($model = 'mahasiswa' AND $method = 'edit')
	{

		if(isset($_POST['edit']))
		{
			//echo '<script>alert("Edit")</script>';
			$nim			= $_POST['nim'];
			$nama			= $_POST['name'];
			$tempat			= $_POST['tempat'];
			$tanggallahir	= $_POST['tanggallahir'];
			$agama			= $_POST['agama'];
			$thn_masuk		= $_POST['thn_masuk'];
			$thn_lulus		= $_POST['thn_lulus'];
			$judul_skripsi	= $_POST['judul_skripsi'];
			$prestasi		= $_POST['prestasi'];
			$beasiswa		= $_POST['beasiswa'];
			$alamat			= $_POST['alamat'];
			$no_telp		= $_POST['no_telp'];
			$foto = $_POST['foto'];
			if ($_FILES['foto']['tmp_name'] != "")
			{
				$libs->deleteFile('../../asset/mahasiswa/',$foto);
				$foto = $libs->uploadImageToFolder('../../asset/mahasiswa/',$_FILES['foto'],$nim);
			}
			$mahasiswa->updateData($nim,$nama,$tempat,$tanggallahir,$agama,$thn_masuk,$thn_lulus,$judul_skripsi,$prestasi,$beasiswa,$alamat,$no_telp,$foto);

			header('Location:'.adm.'mahasiswa');
		}
		
		
	}

	if ($model = 'mahasiswa' AND $method = 'delete') 
	{
		//echo "<br><br>work here" ;

		$id = $_GET['id'];
			//$data = $pengurus->getPengurusById($id);

			//echo "<br><br>work here" ;
		$data = $mahasiswa->getDataById($id);
		foreach ($data as $data) 
		{
			$foto = $data['foto'];
				//echo $foto;
			$libs->deleteFile('../../asset/mahasiswa/',$foto);
			$mahasiswa->deleteData($id);
			header("location:".adm."mahasiswa");
		}
	}
	


}

endif;
?>