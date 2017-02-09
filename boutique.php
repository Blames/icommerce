<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php require_once('includes/header.php'); ?>

<body class="accueuil">
<div class="boutique">
<?php 


$db=new PDO('mysql:host=localhost;dbname=icommerce','root','');
$select = $db->prepare("SELECT * FROM products");
$select -> execute();
?>
<div class="row">
<?php
while ($s=$select ->fetch (PDO::FETCH_OBJ)){
	?>
	
	
	  	<div class="col-sm-4">
			<img src="admin/imgs/<?php echo $s ->name;  ?>.jpg"/>
			<h2><?php echo $s->name; ?></h2>
			<h5><?php echo $s->description; ?></h5>
			<h4><?php echo $s->price; ?>M €</h4>
		</div>

	<?php
}
?>
	</div>
	</div>
	</body>
	<?php

require_once('includes/footer.php');
 ?>
	


