<?php 

	session_start();

	//compruebo si el usuario esta en la base de datos

	require 'database.php';

	if (isset($_SESSION['user_id'])) {
		$records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE id = :id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$users = null;

		if (count($results) > 0) {
			$users = $results;
		}

	}

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bienvenido</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

	<?php require "partials/header.php" ?>

	<?php if(!empty($users)):?>
		<br>Bienvenido. <?= $users['email'] ?>
		<br>Te has logueado satisfactoriamente
		<a href="logout.php">Logout</a>

	<?php else: ?>

		<h1>Please login or signup</h1>
		<a href="login.php">Login</a> or
		<a href="signup.php">Signup</a>

	<?php endif ?>
</body>
</html>