<?php 

require_once('includes/header.php');
$db=new PDO('mysql:host=localhost;dbname=icommerce','root','');
$select = $db->prepare("SELECT * FROM products");
$select -> execute();

while ($s=$select ->fetch (PDO::FETCH_OBJ)){
	?>

	<h2><?php echo $s->name; ?></h2>
	<h5><?php echo $s->description; ?></h5>
	<h4><?php echo $s->price; ?></h4>
	<?php
}


require_once('includes/footer.php');
 ?>