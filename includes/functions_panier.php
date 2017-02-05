<?php 

 	function creationPanier(){
 		if(!isset($_SESSION['panier'])){
 			$_SESSION['panier']=array();
 			$_SESSION['panier']['libelleProduit']=array();
 			$_SESSION['panier']['qteProduit']=array();
 			$_SESSION['panier']['prixProduit']=array();
 			$_SESSION['panier']['verrou']=false;


 		}
 		return true;
 	}

 	function ajouterArticle($libelleProduit,$qteProduit,$prixProduit){
 		if (creationPanier() && !isVerrouille()) {
 			$position_produit = array_search($libelleProduit, $_SESSION['panier']['libelleProduit']);
 			if ($position_produit !==false) {
 				$_SESSION['panier']['libelleProduit'][$position_produit]+= $qteProduit;
 			}else{
 				array_push($_SESSION['panier']['libelleProduit'], $libelleProduit);
 				array_push($_SESSION['panier']['qteProduit'], $qteProduit);
 				array_push($_SESSION['panier']['prixProduit'], $prixProduit);
 			}

 		}else{
 			echo "Erreur, veuillez contacter l'admin.";

 		}
 	}

 	function modifierQteProduit($libelleProduit,$qteProduit){
 		if (creationPanier()&& !isVerrouille()) {
 			if ($qteProduit>0) {
 				$position_produit = array_search($_SESSION['panier']['libelleProduit'], $libelleProduit);
 				if ($position_produit !==false) {
 					$_SESSION['panier']['libelleProduit'][$position_produit] = $qteProduit;
 				}
 			}else{
 				supprimerProduit($libelleProduit);
 			}


 		}else{
 			echo "Erreur, veuillez contacter l'admin.";
 		}
 	}

 	function supprimerProduit($libelleProduit){
 		if (creationPanier() && !isVerrouille()) {

 			$tmp=array();
 			$tmp['libelleProduit']=array();
 			$tmp['qteProduit']=array();
 			$tmp=['prixProduit']=array();
 			$tmp=['verrou']=array();

 			for ($i=0; $i < count($_SESSION['panier']['libelleProduit']); $i++) { 

 				if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit) {

	 				array_push($_SESSION['panier']['libelleProduit'], $_SESSION['panier']['libelleProduit'][$i]);
	 				array_push($_SESSION['panier']['qteProduit'],$_SESSION['panier']['qteProduit'][$i] );
	 				array_push($_SESSION['panier']['prixProduit'], $_SESSION['panier']['prixProduit'][$i] ); 				}
 				}
 			}

 			$_SESSION['panier'] = $tmp;
 			unset($tmp);

 		}else{
 			echo "Erreur veuillez contacter l'admin.";
 		}
 	}

 	function montantGlobal(){
 		$total=0;
 		for ($i=0; $i < count($_SESSION['panier']['libelleProduit']); $i++) {

 			$total+= $_SESSION['panier']['qteProduit'][$i]*$_SESSION['panier']['prixProduit'];

 		}
 		return $total;
 	}

 	function supprimerPanier(){
 		if (isset($_SESSION['panier'])) {
 			unset($_SESSION['panier']);
 		}
 	}


 	function isVerouille(){
 		if (isset($_SESSION['panier'])&& $_SESSION['isVerouille']) {
 			return true;
 		}else{
 			return false;
 		}
 	}

 	function compterArticle(){

 		if (isset($_SESSION['panier'])) {
 			return count($_SESSION['panier']['libelleProduit'])
 		} else{
 			return 0;
 		}
 	}

 ?>