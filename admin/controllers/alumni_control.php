<?php 

session_start();
date_default_timezone_set('Asia/Makassar');
require('../../models/load_class.php');
require('../../libs/path.php');
ob_start();
$model = $_GET['model'];
$method = $_GET['method'];
$model;

if($model = 'mhs_alumni' AND $method = 'add'){
	if(isset($_POST['submit'])){
		$id_acak = '1'.date('Hi').mt_rand(100,999);
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$ttl = $_POST['ttl'];
		$agama = $_POST['agama'];
		$thn_masuk = $_POST['thn_masuk'];
		$thn_lulus = $_POST['thn_lulus'];
		$judul_skripsi = $_POST['judul_skripsi'];
		$kegiatan = $_POST['kegiatan'];
		$prestasi = $_POST['prestasi'];
		$beasiswa = $_POST['beasiswa'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];
		$foto = "";

		if($_FILES['foto']['tmp_name'] != ""){
			$foto= $libs->$uploadFile('../../assets/mhs_alumni',$_FILES['foto'],$id_acak);
		}


		$mhs_alumni->addData($nim,$nama,$ttl,$agama,$thn_masuk,$thn_lulus,$judul_skripsi,$kegiatan,$prestasi,$beasiswa,$alamat,$no_telp,$foto);
		header('Location:'.adm.'mhs_alumni');	
	}
}
if($model = 'mhs_alumni' AND $method = 'edit'){
	if(isset($_POST['edit'])){
		$id_acak = '1'.date('Hi').mt_rand(100,999);
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$ttl = $_POST['ttl'];
		$agama = $_POST['agama'];
		$thn_masuk = $_POST['thn_masuk'];
		$thn_lulus = $_POST['thn_lulus'];
		$judul_skripsi = $_POST['judul_skripsi'];
		$kegiatan = $_POST['kegiatan'];
		$prestasi = $_POST['prestasi'];
		$beasiswa = $_POST['beasiswa'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];
		$foto = $_POST['foto'];

		if($_FILES['foto']['tmp_name']!= ""){
			$libs->deleteFile('../../assets/mhs_alumni/',$foto);
			$foto= $libs->$uploadFile('../../assets/mhs_alumni',$_FILES['foto'],$id_acak);
		}
		$mhs_alumni->updateData($nim,$nama,$ttl,$agama,$thn_masuk,$thn_lulus,$judul_skripsi,$kegiatan,$prestasi,$beasiswa,$alamat,$no_telp,$foto);
		header('Location:'.adm.'mhs_alumni');
	}
}
if($model = 'mhs_alumni' AND $method = 'delete'){
		$id = $_GET['id'];
			
		$data = $mhs_alumni->getDataById($id);
		$libs->deleteFile("../../assets/mhs_alumni/", $data['foto']);
		$berita->deleteData($id);
		header('Location:'.adm.'mhs_alumni');
}

 ?>