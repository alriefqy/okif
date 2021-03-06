<?php 

	/**
	* ini adalah kumpulan fungsi untuk artiker
	*/
	class pengurus_model
	{
		private $db;
		function __construct($database)
		{
			$this->db=$database;
		}

		public function getPengurus()
		{
			$query = $this->db->prepare("SELECT * FROM `pengurus`");

			try {
				$query->execute();
				
			} catch (PDOException $e) {
				die();				
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getPengurusById($id)
		{
			$query = $this->db->prepare("SELECT * FROM `pengurus` WHERE id=:id");
			$query->bindParam(':id', $id);
			try {
							$query->execute();
						} catch (PDOException $e) {
							die($e->getMessage());
						}			
						return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function addPengurus($id,$name,$jabatan,$periode,$status,$foto)
		{
			$query = $this->db->prepare("INSERT INTO `pengurus` (id,name,jabatan,periode,kompartemen,foto) VALUES (?,?,?,?,?,?)");
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
		public function deletePengurus($id)
		{
			$query = $this->db->prepare("DELETE FROM `pengurus` WHERE `id` = ?");
			
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
		public function editPengurus($id,$name,$jabatan,$periode,$status,$foto)
		{
			$query = $this->db->prepare("UPDATE `pengurus` SET `name` = :name,
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
		public function getAllPengurus()
		{
			$query = $this->db->prepare("SELECT p.periode,p.name,p.jabatan,p.foto,k.name,k.periode,k.jabatan,k.foto FROM `pengurus` AS p JOIN `ketua` AS k ON p.periode = k.periode");
		try {
				$query->execute();
				
			} catch (PDOException $e) {
				die();				
			}
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		

	}

?>