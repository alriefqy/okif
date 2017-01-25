<?php 

	/**
	* ini adalah kumpulan fungsi untuk artiker
	*/
	class dewan_model
	{
		private $db;
		function __construct($database)
		{
			$this->db=$database;
		}

		public function getDewan()
		{
			$query = $this->db->prepare("SELECT * FROM `dewan`");

			try {
				$query->execute();
				
			} catch (PDOException $e) {
				die();				
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function getDewanUrut()
		{
			$query = $this->db->prepare("SELECT * FROM `dewan` ORDER BY `angkatan`");

			try {
				$query->execute();
				
			} catch (PDOException $e) {
				die();				
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getDewanById($id)
		{
			$query = $this->db->prepare("SELECT * FROM `dewan` WHERE id=:id");
			$query->bindParam(':id', $id);
			try {
							$query->execute();
						} catch (PDOException $e) {
							die($e->getMessage());
						}			
						return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function addDewan($id,$name,$angkatan,$periode,$foto)
		{
			$query = $this->db->prepare("INSERT INTO `dewan` (id,nama,angkatan,periode,foto) VALUES (?,?,?,?,?)");
			$query->bindValue(1,$id);
			$query->bindValue(2,$name);
			$query->bindValue(3,$angkatan);
			$query->bindValue(4,$periode);
			$query->bindValue(5,$foto);
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
		public function deleteDewan($id)
		{
			$query = $this->db->prepare("DELETE FROM `dewan` WHERE `id` = ?");
			
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
		public function editDewan($id,$name,$angkatan,$periode,$foto)
		{
			$query = $this->db->prepare("UPDATE `dewan` SET `nama` = :nama,
								`angkatan`	= :angkatan,
								`periode`	= :periode,
								`foto`		= :foto
								WHERE `id`   =:id");
			$query->bindParam(':id',$id,PDO::PARAM_INT);
			$query->bindParam(':nama',$name,PDO::PARAM_STR);
			$query->bindParam(':angkatan',$angkatan,PDO::PARAM_STR);
			$query->bindParam(':periode',$periode,PDO::PARAM_STR);
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