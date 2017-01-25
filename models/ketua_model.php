<?php 

	/**
	* ini adalah kumpulan fungsi untuk artiker
	*/
	class ketua_model
	{
		private $db;
		function __construct($database)
		{
			$this->db=$database;
		}

		public function getKetua()
		{
			$query = $this->db->prepare("SELECT * FROM `ketua`");

			try {
				$query->execute();
				
			} catch (PDOException $e) {
				die();				
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function getKetuaHimpunan()
		{
			$query = $this->db->prepare("SELECT * FROM `ketua` WHERE `status` = 'himpunan'");

			try {
				$query->execute();
				
			} catch (PDOException $e) {
				die();				
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function getKetuaDewan()
		{
			$query = $this->db->prepare("SELECT * FROM `ketua` WHERE `status` = 'dewan'");

			try {
				$query->execute();
				
			} catch (PDOException $e) {
				die();				
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function getKetuaById($id)
		{
			$query = $this->db->prepare("SELECT * FROM `ketua` WHERE id=:id");
			$query->bindParam(':id', $id);
			try {
							$query->execute();
						} catch (PDOException $e) {
							die($e->getMessage());
						}			
						return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function addKetua($id,$name,$jabatan,$periode,$status,$foto)
		{
			$query = $this->db->prepare("INSERT INTO `ketua` (id,name,jabatan,periode,kompartemen,foto) VALUES (?,?,?,?,?,?)");
			$query->bindValue(1,$id);
			$query->bindValue(2,$name);
			$query->bindValue(3,$jabatan);
			$query->bindValue(4,$periode);
			$query->bindValue(5,$status);
			$query->bindValue(6,$foto);
			try
			{
				$query->execute();
			}
			catch(PDOException $e)
			{
				die($e->getMessage());
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function deleteKetua($id)
		{
			$query = $this->db->prepare("DELETE FROM `ketua` WHERE `id` = ?");
			
			$query->bindValue(1, $id);
			
			try
			{
				$query->execute();
			}
			catch(PDOException $e)
			{
				die($e->getMessage());
			}
			
		}
		public function editKetua($id,$name,$jabatan,$periode,$status,$foto)
		{
			$query = $this->db->prepare("UPDATE `ketua` SET `name` = :name,
								`jabatan`	= :jabatan,
								`periode`	= :periode,
								`kompartemen`	= :kompartemen,
								`foto`		= :foto
								WHERE `id`   =:id");
			$query->bindParam(':id',$id,PDO::PARAM_INT);
			$query->bindParam(':name',$name,PDO::PARAM_STR);
			$query->bindParam(':jabatan',$jabatan,PDO::PARAM_STR);
			$query->bindParam(':periode',$periode,PDO::PARAM_STR);
			$query->bindParam(':kompartemen',$status,PDO::PARAM_STR);
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
		

	}

?>