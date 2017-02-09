<link rel="stylesheet" type="text/css" href="http://localhost:8080/icommerce/style/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<body class="headerAdminBack">

<?php 

session_start();

$user= 'admin';
$password_user="password";

if (isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username&&$password) { //vérifie que les champs soient remplis
		

		if (($user==$username)&&($password==$password_user)) { // vérifie que les champs soient corrects
				echo "là normalement ça se connecte.";


				$_SESSION['username']=$username;
				header('location: admin.php');

			}else{
				echo "Les identifiants semblent erronés";
			}
	}else{
		echo'Veuillez remplir tous les champs.';
	}
}


 ?>


<div class="buttonAdmin">
<h1 class="headerAdmin">administration - Connexion</h1>
<br><br>
<form action ="" method ="POST">
<h3 class="headerAdmin">Pseudo : </h3> <input type="text" name="username"/><br/><br/>
<h3 class="headerAdmin">Mot de passe : </h3> <input type="password" name="password"/><br/><br/>
<input type="submit" name="submit"/><br/><br/>
</form>

<a  href="/icommerce/index.php" id="buttonRetourAccueuil">Retour à l'acceuil</a>
</div>
</body>