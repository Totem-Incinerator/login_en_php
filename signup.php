<?php  
	require 'database.php';

	$message = '';

	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
		$statement = $conn->prepare($sql);
		$statement->bindParam(':email', $_POST['email']);
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$statement->bindParam(':password',$password);

		if ($statement->execute()) {
			$message = 'Usuario creado con exito';
		}else{
			$message = 'Ha ocurrido un error';
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<?php require "partials/header.php" ?>
	
	<?php if(!empty($message)): ?>
		<p> <?= $message ?> </p>
	<?php endif ?>


	<h1>Signup</h1>
	<span>or <a href="login.php">Login</a> </span>
	<form action="signup.php" method="post">
		<input type="text" name="email" placeholder="Enter your email">
		<input type="password" name="password" placeholder="Enter your password">
		<input type="password" name="confirm-password" placeholder="confirm password">
		<input type="submit" value="Send">
	</form>

</body>
</html>