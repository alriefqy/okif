<?php 
	try {
		$db = new PDO('mysql:host=localhost;dbname=okif','root', '');
	} catch (PDOException $e) {
		echo $e->getMessage();
		die();
	}
?>