<?php
require('../models/load_class.php');
require('../libs/path.php');
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
			$foto = $libs->uploadFile('../asset/mahasiswa/',$_FILES['foto'],$nim);
		}
		else
		{
			$foto = 'error';
		}
		$mahasiswa->addData($nim,$nama,$tempat,$tanggallahir,$agama,$thn_masuk,$thn_lulus,$judul_skripsi,$prestasi,$beasiswa,$alamat,$no_telp,$foto);

		header('Location:'.root.'form?act=add');
		
	
	}
}
?>