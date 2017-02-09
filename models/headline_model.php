<?php
class headline_model {
	private $db;
	public function __construct($database) {
		$this->db = $database;
	}

	public function getDataLengkap() {
		$query = $this->db->prepare("SELECT * FROM `headline`");
		try {
			$query->execute();
		} catch(PDOException $e) {
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getDataById($id) {
		$query = $this->db->prepare("SELECT * FROM `headline` WHERE `id` = :id");
		$query->bindParam(':id', $id, PDO::PARAM_INT);

		try {
			$query->execute();
		} catch(PDOException $e) {
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function updateData($id, $judul, $deskripsi, $foto,$foto_headline) {
			$query = $this->db->prepare("UPDATE `headline` 	SET	`judul`		= :judul,
																					`deskripsi`	= :deskripsi,
																					`foto`		= :foto,
																					`foto_headline` = :foto_headline
																			WHERE `id`			= :id
			");

			$query->bindParam(':id', $id, PDO::PARAM_INT);
			$query->bindParam(':judul', $judul, PDO::PARAM_STR);
			$query->bindParam(':deskripsi', $deskripsi, PDO::PARAM_STR);
			$query->bindParam(':foto', $foto, PDO::PARAM_STR);
			$query->bindParam(':foto_headline', $foto_headline, PDO::PARAM_STR);

			try {
				$query->execute();
				return true;
			} catch (PDOException $e) {
				return die($e->getMessage());
			}
		}
		public function deleteFoto($id)
		{
			$query = $this->db->prepare("DELETE `foto_headline` FROM `headline` WHERE `id` = ?");
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
}
?>
