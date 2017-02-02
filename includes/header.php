
<?php 

session_start();

try{
	$db=new PDO('mysql:host=localhost;dbname=icommerce','root','');
	$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
	echo "Une erreur est survenue";
	die();
}
?>



<!-- DOCTYPE supprimé, ca peut être utile de le préciser-->
<html>
	<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="style/style.css">

	</head>


	<header>

	<br\><h1>SITE DE LA GLOIRE.</h1><br>
		<ul class="menu">
			<li><a href="index.php">Acceuil</a></li>
			<li><a href="boutique.php">Boutique</a></li>
			<li><a href="panier.php">Panier</a></li>
			<li><a href="inscription.php">Inscription</a></li>
			<li><a href="connexion.php">Connexion</a></li>
		</ul>
 
	</header>

</html>