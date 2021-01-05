<?php 

	$server = 'localhost';
	$user = 'root';
	$password = '';
	$dataBase = 'php_login_db';

	try {
		$conn = new PDO("mysql:host=$server;dbname=$dataBase",$user,$password);
	} catch (Exception $e) {
		die('Conexión fallida: '. $e->getMessage());
	}


 ?>