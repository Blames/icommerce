<link rel="stylesheet" type="text/css" href="http://localhost:8080/icommerce/style/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php 

session_start();?>
<body class="headerAdminBack">
<br>
<h1 align="center" class="headerAdmin">PANNEAU D'ADMINISTRATION</h1>
<br>
<br>
<h1 class="headerAdmin">Vous êtes connecté en tant que : <?php echo $_SESSION['username'] ?></h1>
<a href="/icommerce/index.php"><button type="button" class="btn btn-primary">Retour à l'acceuil</button></a>
<a href="?action=add"><button type="button" class="btn btn-primary">Ajouter un produit</button></a>
<a href="?action=modifyanddelete"><button type="button" class="btn btn-primary">Modifier/Supprimer un produit</button></a>
<br><br>

<?php

if(isset($_SESSION['username'])){

	if(isset($_GET['action'])){


		if ($_GET['action']=='add') {
			if (isset($_POST['submit'])) {
				
				$title=$_POST['title'];
				$description=$_POST['description'];
				$price=$_POST['price'];
				$quantity=$_POST['quantity'];

				$img=$_FILES['img']['name'];

				$img_tmp= $_FILES['img']['tmp_name'];

				if (!empty($img_tmp)) {
					
					$image =explode('.',$img);
					$image_ext= end($image);

					if (in_array(strtolower($image_ext),array('png','jpg','jpeg'))==false) {
						echo "Votre extension d'image n'est pas prise en compte. Veuillez entrer une image en .png, .jpg ou .jpeg !";

					}else{

						$image_size = getimagesize($img_tmp);

						if ($image_size['mime']=='image/jpeg') {

							$image_src = imagecreatefromjpeg($img_tmp);

						}else if ($image_size['mime']=='image/png') {

							$image_src = imagecreatefrompng($img_tmp);

						}else{

							$image_src = false;
							echo "Veuillez entrer une image valide";
						}

					if ($image_src!==false) {
					$image_width = 200;
				
					if ($image_size[0]==$image_width) {
							$image_final = $image_src;

						}else{
							$new_width[0]=$image_width;
							$new_height[1] = 200;

							$image_final = imagecreatetruecolor($new_width[0], $new_height[1]);

							imagecopyresampled($image_final, $image_src, 0, 0, 0, 0, $new_width[0], $new_height[1], $image_size[0], $image_size[1]);

						}


						imagejpeg($image_final,'imgs/'.$title.'.jpg');
					}
				}


				}else{
					echo "Veuillez entrer une image.";
				}


				if ($title&&$description&&$price&&$quantity) {

					try{
						$db=new PDO('mysql:host=localhost;dbname=icommerce','root','');
						$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
						$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						echo "Votre produit a bien été enregistré !";
					}
					catch(Exception $e){
						echo "Une erreur est survenue";
						die();
					}

					$insert = $db->prepare("INSERT INTO products VALUES('0','$title','$description','$quantity','$price')"); 
					$insert -> execute();


				}else{
					 echo "Veuillez remplir tous les champs.";
				}

			}
			

			?>

			<form class="headerAdmin" action="" method="post" enctype="multipart/form-data">
				<h3>Titre du produit :</h3><input type="text" name="title">
				<h3>Description du produit :</h3><textarea name="description"></textarea>
				<h3>Prix :</h3><input type="text" name="price">
				<h3>Quantité :</h3><input type="text" name="quantity">
				<h3>Image :</h3>
				<input type="file" name="img">
				</br></br>
				<input type="submit" name="submit" value="Ajouter">
			</form>


			<?php

		}else if ($_GET['action']=='modifyanddelete') {

			$db=new PDO('mysql:host=localhost;dbname=icommerce','root','');
			$select = $db->prepare ("SELECT * FROM products"); 
			$select -> execute();

			while ($s=$select->fetch(PDO::FETCH_OBJ)) {
				echo $s->name;
				?>
				<a href="?action=modify&amp;id=<?php echo $s->id; ?>"> Modifier</a>
				<a href="?action=delete&amp;id=<?php echo $s->id; ?>"> X</a>
				</br>
				<?php

			}

		}else if ($_GET['action']=='modify') {


			$id=$_GET['id'];

			$db=new PDO('mysql:host=localhost;dbname=icommerce','root','');
			$select = $db->prepare ("SELECT * FROM products WHERE id=$id"); 
			$select -> execute();

			$data = $select->fetch(PDO::FETCH_OBJ);

			?>

			<form action="" method="post">
				<h3>Titre du produit :</h3><input value="<?php echo $data->name; ?>" type="text" name="title">
				<h3>Description du produit :</h3><input value="<?php echo $data->description; ?>" name="description">
				<h3>Prix :</h3><input value="<?php echo $data->price; ?>" type="text" name="price">
				<h3>Quantité :</h3><input value="<?php echo $data->quantity; ?>" type="text" name="quantity">
				<input type="submit" name="submit" value ="Modifier">
			</form>


			<?php
			if(isset ($_POST['submit'])){

				$title=$_POST['title'];
				$description=$_POST['description'];
				$price=$_POST['price'];
				$quantity=$_POST['quantity'];

				$update= $db->prepare("UPDATE products SET name='$title',description='$description',price='$price',quantity='$quantity' WHERE id=$id");
				$update->execute();
				header('Location: admin.php');

			}

		}


		else if ($_GET['action']=='delete') {
			$db=new PDO('mysql:host=localhost;dbname=icommerce','root','');
			$id=$_GET['id'];
			$select = $db->prepare("DELETE FROM products WHERE id=$id");
			$select -> execute();
		}
	}
}

else{
header('location: ../index.php');
} 
?>
</body>
