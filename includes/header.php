
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


<link rel="stylesheet" type="text/css" href="style/style.css">
	</head>


	<header class="header">

	<br\>
	<br>
	<h1 class="titre" style="font-size: 700%">CONSPI-MARKET</h1>
		<br>
		<h2 class="sousTitre"> Pour gouverner en toute tranquillité !</h2>
		<br>

				<ul class="menu">
					<div class="btn-grp">

								<a href="index.php"><button type="button" class="btn btn-primary">Accueil</button></a>

								<a href="boutique.php"><button type="button" class="btn btn-primary">Boutique</button></a>

								<a href="panier.php"><button type="button" class="btn btn-primary">Panier</button></a>

								<a href="admin"><button type="button" class="btn btn-primary">Connexion</button></a>
					</div>

				</ul>

 
	</header>

</html>