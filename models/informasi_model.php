<?php

class informasi_model
{
	private $db;
	function __construct($database)
	{
		$this->db=$database;
	}
	public function getInformasi()
	{
		$query = $this->db->prepare("SELECT * FROM  `informasi` ");
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			die();
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getInformasiById($id)
		{
			$query = $this->db->prepare("SELECT * FROM `informasi` WHERE id='$id'");
			try
			{
				$query->execute();
			}
			catch(PDOexception $e)
			{
				die($e->getMessage);
				echo $e;
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
	
	
	
	public function addInformasi($id,$kegiatan,$waktu,$content,$foto)
		{
			$query = $this->db->prepare("INSERT INTO `informasi` (id,kegiatan,waktu,content,foto) VALUES (?,?,?,?,?)");
			$query->bindValue(1,$id);
			$query->bindValue(2,$kegiatan);
			$query->bindValue(3,$waktu);
			$query->bindValue(4,$content);
			$query->bindValue(5,$foto);
			try
			{
				$query->execute();
			}
			catch(PDOexception $e)
			{
				echo $e;
			}

				
		}
		public function editInformasi($id,$kegiatan,$waktu,$content,$foto)
		{
			$query = $this->db->prepare("UPDATE `informasi` SET `kegiatan` = :kegiatan,
								`waktu`	= :waktu,
								`content`		= :content,
								`foto`	= :foto
								WHERE `id`   =:id");
			$query->bindParam(':id',$id,PDO::PARAM_INT);
			$query->bindParam(':kegiatan',$kegiatan,PDO::PARAM_STR);
			$query->bindParam(':waktu',$waktu,PDO::PARAM_STR);
			$query->bindParam(':content',$content,PDO::PARAM_STR);
			$query->bindParam(':foto',$foto,PDO::PARAM_STR);
			

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
		public function deleteInformasi($id)
		{
			$query = $this->db->prepare("DELETE FROM `informasi` WHERE `id` = ?");
			$query->bindValue(1,$id);
			try
			{
				$query->execute();
			}
			catch(PDOException $e)
			{
				return die($e->getMessage());
			}
		}
		
		public function recentInformasi()
		{
			$query = $this->db->prepare("SELECT * FROM `informasi` ORDER BY `waktu`");
			try
			{
				$query->execute();
			}
			catch(PDOException $e)
			{
				return die($e->getMessage());
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function countDataLengkap()
		 {
			$query = $this->db->prepare("SELECT * FROM `artikel`");

			try {
				$query->execute();
				return $query->rowCount();
			} catch(PDOException $e){
				$e->getMessage();
			}
		}

		public function getDataLengkap() {
			$query = $this->db->prepare("SELECT * FROM `artikel` ORDER BY `id` DESC");

			try {
				$query->execute();
			} catch(PDOException $e) {
				die($e->getMessage());
			}

			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function countDataLimit($a, $b) {
			$query = $this->db->prepare("SELECT * FROM `artikel` LIMIT :a,:b");
			$query->bindParam(':a', $a, PDO::PARAM_INT);
			$query->bindParam(':b', $b, PDO::PARAM_INT);

			try {
				$query->execute();
				return $query->rowCount();
			} catch(PDOException $e) {
				die($e->getMessage());
			}
		}

		public function getDataLimit($a, $b) {
			$query = $this->db->prepare("SELECT * FROM `artikel` ORDER BY `id` DESC LIMIT :a,:b");
			$query->bindParam(':a', $a, PDO::PARAM_INT);
			$query->bindParam(':b', $b, PDO::PARAM_INT);

			try {
				$query->execute();
			} catch(PDOException $e) {
				die($e->getMessage());
			}

			return $query->fetchAll(PDO::FETCH_ASSOC);
		}


	
}

?>