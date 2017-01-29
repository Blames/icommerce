<link rel="stylesheet" type="text/css" href="style/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php 

session_start();


if(isset($_SESSION['username'])){

	if(isset($_GET['action'])){


		if ($_GET['action']=='add') {
			echo "add";
		}
		else if ($_GET['action']=='modify') {
			echo "modify";
		}
		else if ($_GET['action']=='delete') {
			echo "delete";
		}









	}
}

else{
header('location: ../index.php');
} 
?>



<h1>Bienvenue <?php echo $_SESSION['username'] ?>!</h1>

<a href="?action=add">Ajouter un produit</a>
<a href="?action=modify">Modifier un produit</a>
<a href="?action=delete">Supprimer un produit</a>