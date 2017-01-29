<link rel="stylesheet" type="text/css" href="style/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php 

session_start();


if(isset($_SESSION['username'])){

	if(isset($_GET['action'])){


		if ($_GET['action']=='add') {
			if (isset($_POST['submit'])) {
				
				$title=$_POST['title'];
				$description=$_POST['description'];
				$price=$_POST['price'];

				if ($title&&$description&&$price) {
					
					$db=new PDO('mysql:host=localhost;dbname=icommerce','root','');

					$insert = $db->prepare("INSERT INTO products VALUES('','$title','$description','1','$price')"); // Là c'est la merde, il faut que je configure bien ma base de données.


				}else{
					echo "Veuillez remplir tous les champs.";
				}

			}
			

			?>

			<form action="" method="post">
				<h3>Titre du produit :</h3><input type="text" name="title">
				<h3>Description du produit :</h3><input type="text" name="description">
				<h3>Prix :</h3><input type="text" name="price">
				<input type="submit" name="submit">
			</form>


			<?php
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