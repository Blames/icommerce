
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


	<header class="header">

	<br\>

	<h1 class="titre">CONSPI-MARKET</h1>

				<ul class="menu">
					<div class="btn-grp">

								<a href="index.php"><button type="button" class="btn btn-primary">Acceuil</button></a>

								<a href="boutique.php"><button type="button" class="btn btn-primary">Boutique</button></a>

								<a href="panier.php"><button type="button" class="btn btn-primary">Panier</button></a>

								<a href="admin"><button type="button" class="btn btn-primary">Connexion</button></a>
					</div>

				</ul>

 
	</header>

</html>