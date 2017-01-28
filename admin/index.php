

<?php 

$user= 'admin';
$password_user="password";

if (isset($_POST['submit'])){

$username = $_POST['username'];
$password = $_POST['password'];



if (($user=$username)&&($password=$password_user)) {
		echo "là normalement ça se connecte.";
	}else{
		echo "Identifiants erronés";
	}



}

 ?>

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<h1>administration - Connexion</h1>
<form action ="" method ="POST">
<h3>Pseudo : </h3> <input type="text" name="username"/><br/><br/>
<h3>Mot de passe : </h3> <input type="password" name="password"/><br/><br/>
<input type="submit" name="submit"/><br/><br/>
</form>