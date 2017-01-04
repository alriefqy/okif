<?php
class mahasiswa_model
{
	private $db;
	function __construct($database){
		$this->db=$database;
	}

	public function getData(){
		$query = $this->db->prepare("SELECT * FROM `mahasiswa_alumni`");
		try {
			$query->execute();
		} catch (PDOException $e) {
			die();
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getDataById($id){
		$query = $this->db->prepare("SELECT * FROM `mahasiswa_alumni` WHERE nim ='$id'");
		//$query->bindParam(':nim',$id);
		try {
			$query->execute();
			
		} catch (PDOException $e) {
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function addData($nim,$nama,$tempat,$tanggallahir,$agama,$thn_masuk,$thn_lulus,$judul_skripsi,$prestasi,$beasiswa,$alamat,$no_telp,$foto)
	{
		$query = $this->db->prepare("INSERT INTO `mahasiswa_alumni` (nim,nama,tempat,tanggallahir,agama,thn_masuk,thn_lulus,judul_skripsi,prestasi,beasiswa,alamat,no_telp,foto) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?) ");
		$query->bindValue(1, $nim);
		$query->bindValue(2, $nama);
		$query->bindValue(3, $tempat);
		$query->bindValue(4, $tanggallahir);
		$query->bindValue(5, $agama);
		$query->bindValue(6, $thn_masuk);
		$query->bindValue(7, $thn_lulus);
		$query->bindValue(8, $judul_skripsi);
		$query->bindValue(9, $prestasi);
		$query->bindValue(10, $beasiswa);
		$query->bindValue(11, $alamat);
		$query->bindValue(12, $no_telp);
		$query->bindValue(13, $foto);

		try {
			$query->execute();

		} catch (PDOException $e) {
			die($e->getMessage());				
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function updateData($nim,$nama,$tempat,$tanggallahir,$agama,$thn_masuk,$thn_lulus,$judul_skripsi,$prestasi,$beasiswa,$alamat,$no_telp,$foto)
	{
		$query = $this->db->prepare("UPDATE `mahasiswa_alumni` 	SET	`nama`	= :nama,
			`tempat`			= :tempat,
			`tanggallahir`		= :tanggallahir,
			`agama`		= :agama,
			`thn_masuk`		= :thn_masuk,
			`thn_lulus`			= :thn_lulus,
			`judul_skripsi`		= :judul_skripsi,
			`prestasi`		= :prestasi,
			`beasiswa`		= :beasiswa,
			`alamat`			= :alamat,
			`no_telp`		= :no_telp,
			`foto`		= :foto
			
			WHERE `nim`			= :nim
			");

		$query->bindParam(':nim', $nim, PDO::PARAM_INT);
		$query->bindParam(':nama', $nama, PDO::PARAM_STR);
		$query->bindParam(':tempat', $tempat, PDO::PARAM_STR);
		$query->bindParam(':tanggallahir', $tanggallahir, PDO::PARAM_STR);
		$query->bindParam(':agama', $agama, PDO::PARAM_STR);
		$query->bindParam(':thn_masuk', $thn_masuk, PDO::PARAM_STR);
		$query->bindParam(':thn_lulus', $thn_lulus, PDO::PARAM_STR);
		$query->bindParam(':judul_skripsi', $judul_skripsi, PDO::PARAM_STR);
		$query->bindParam(':prestasi', $prestasi, PDO::PARAM_STR);
		$query->bindParam(':beasiswa', $beasiswa, PDO::PARAM_STR);
		$query->bindParam(':alamat', $alamat, PDO::PARAM_STR);
		$query->bindParam(':no_telp', $no_telp, PDO::PARAM_STR);
		$query->bindParam(':foto', $foto, PDO::PARAM_STR);
		try
		{
			$query->execute();
			return true;
		}
		catch(PDOException $e)
		{
			return die($e->getMessage());
		}
	}

	public function deleteData($id){
		$query = $this->db->prepare("DELETE FROM `mahasiswa_alumni` WHERE `nim` = ?");
		$query->bindValue(1, $id);

		try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}
	
}			
?>