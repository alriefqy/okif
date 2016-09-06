<?php 
	try {
		$db = new PDO('mysql:host=localhost;dbname=cmsdesa','root', '');
	} catch (PDOException $e) {
		echo $e->getMessage();
		die();
	}
?>