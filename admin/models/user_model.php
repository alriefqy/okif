<?php

class user_model
{
	private $db;
	function __construct($database)
	{
		$this->db=$database;
	}
	function getUser()
	{
		$query = $this->db->prepare("SELECT * FROM  `user` ");
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
	function getUserByUserName($username)
	{
		$query = $this->db->prepare(" SELECT * FROM `user` WHERE `user` = ?");
		$query->bindValue(1, $username);
		try
		{
			$query->execute();
			return $query->fetch();
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function authUser($username) {
			$query = $this->db->prepare("SELECT * FROM `user` WHERE `user` = ?");
			$query->bindValue(1, $username);

			try {
				$query->execute();
				return $query->rowCount();
			} catch(PDOException $e) {
				$e->getMessage();
			}
		}

		public function setSession($username, $session) {
			$query = $this->db->prepare("UPDATE `user` SET `id_session` = ? WHERE `user` = ?");

			$query->bindValue(1, $session);
		 	$query->bindValue(2, $username);

			try {
				$query->execute();
			} catch(PDOException $e) {
				die($e->getMessage());
			}
		}
}

?>