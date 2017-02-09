<?php

class tentang_model
{
	private $db;
	function __construct($database)
	{
		$this->db=$database;
	}
	public function getTentang()
	{
		$query = $this->db->prepare("SELECT * FROM  `tentang`");
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
	public function getTentangById($id)
		{
			$query = $this->db->prepare("SELECT * FROM `tentang` WHERE id='$id'");
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
	public function getHit($id)
	{
		$query = $this->db->prepare("SELECT `hit` FROM `artikel` WHERE `id` = ?");
		$query->bindValue(1,$id);
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);// disini pake fetch saja karena hanya ada satu tabel yang mau ditarik dari database, kalau fetchall dia menarik semua data, karena perintah query antara fetch dan fetch all beda.
	}
	
	public function addArtikel($id,$judul,$content,$foto,$time,$author)
		{
			$query = $this->db->prepare("INSERT INTO `artikel` (id,title,content,foto,time_record,author) VALUES (?,?,?,?,?,?)");
			$query->bindValue(1,$id);
			$query->bindValue(2,$judul);
			$query->bindValue(3,$content);
			$query->bindValue(4,$foto);
			$query->bindValue(5,$time);
			$query->bindParam(6,$author);
			try
			{
				$query->execute();
			}
			catch(PDOexception $e)
			{
				echo $e;
			}

				
		}
		public function editArtikel($id,$title,$content,$foto,$time_record,$author)
		{
			$query = $this->db->prepare("UPDATE `artikel` SET `title` = :title,
								`content`	= :content,
								`foto`		= :foto,
								`time_record`	= :time_record,
								`author` 	= :author
								WHERE `id`   =:id");
			$query->bindParam(':id',$id,PDO::PARAM_INT);
			$query->bindParam(':title',$title,PDO::PARAM_STR);
			$query->bindParam(':content',$content,PDO::PARAM_STR);
			$query->bindParam(':foto',$foto,PDO::PARAM_STR);
			$query->bindParam(':time_record',$time_record,PDO::PARAM_STR);
			$query->bindParam(':author',$author,PDO::PARAM_INT);
			

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
		public function deleteArtikel($id)
		{
			$query = $this->db->prepare("DELETE FROM `artikel` WHERE `id` = ?");
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
		public function topArtikel()
		{
			$query = $this->db->prepare("SELECT * FROM `artikel` ORDER BY `hit` desc");
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
		public function BestArtikel()
		{
			$query = $this->db->prepare("SELECT * FROM `artikel` ORDER BY `hit` desc LIMIT 0,1");
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
		public function lastArtikel()
		{
			$query = $this->db->prepare("SELECT * FROM `artikel` ORDER BY `time_record` asc limit 0,3");
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
			$query = $this->db->prepare("SELECT * FROM `artikel` LIMIT :a,:b ORDER BY `time_record`");
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
			$query = $this->db->prepare("SELECT * FROM `artikel` ORDER BY `time_record` DESC LIMIT :a,:b");
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