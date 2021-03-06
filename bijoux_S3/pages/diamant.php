<?php
require('../menu/menu.php');
require_once ('config.php');
require_once ('component1.php');

//l'ajout des produits dans la session shopping_cart
if (isset($_POST['add_to_cart'])){
	// si la session shopping cart n'existe pas, alors on l'a crée
	if (isset($_SESSION[$mail]['shopping_cart'])){
		$item_array_id= array_column($_SESSION[$mail]["shopping_cart"], "item_id");
		//si le produit n'est pas déjà ajouté on l'ajoute
		if(!in_array($_GET["id"], $item_array_id)){
			$count = count($_SESSION[$mail]["shopping_cart"]);
			$item_array=array(
			'item_id'		=>  $_GET["id"],
			'item_name'		=>  $_POST["hidden_name"],
			'item_price'	=>  $_POST["hidden_price"],
			'item_quantity'	=>  $_POST["quantity"]		
		);
		//ajout des élément liée au produit(nom, qtité, prix) dans la session 
		$_SESSION[$mail]["shopping_cart"][$count] = $item_array;
		//le compteur du panier est incrémenter de +1
		$_SESSION[$mail]['compteur']+=1;
		}else{
			//le produit a déjà été ajouté
			echo '<script>alert("Item deja ajouté")</script>';
		}
	}else{
		//on crée un la session shopping cart si elle n'existe pas
		$item_array=array(
			'item_id'		=>  $_GET["id"],
			'item_name'		=>  $_POST["hidden_name"],
			'item_price'	=>  $_POST["hidden_price"],
			'item_quantity'	=>  $_POST["quantity"]
		);
		$_SESSION[$mail]['shopping_cart'][0]=$item_array;
		//le compteur du panier est incrémenter de +1
		$_SESSION[$mail]['compteur']+=1;
	}
	//on réactualise la page qui permet de prendre en compte l'ajout du panier
	echo '<script>window.location="diamant.php"</script>';
}


?>

<!DOCTYPE html>
<html>
<head>
	<script>
    //fonction qui permet de filtrer avec le filtre
	function showUser(str) {
	  if (str == "") {
	    document.getElementById("txtHint").innerHTML = "";
   		return;
	  } else {
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
	      	//affiche les résultats dans la div txtHint en fonction du filtre
	        document.getElementById("txtHint").innerHTML = this.responseText;
	      }
	    };
	    //envoie le résultat du filtre à get_diamant.php
	    xmlhttp.open("GET","get_diamant.php?q="+str,true);
	    xmlhttp.send();
	  }
	}
	</script>
</head>
<body>
	<br>
	<h1 style="color:blue; text-align: center;">Le catalogue des diamants</h1>
	<br>
	<div class="nav" style="width:20%; margin-left: 150px;">
		<h2>Filtrer</h2>
		<!-- les filtres à applliquer -->
		<select class="product__footer" id="users" name="users" onchange="showUser(this.value)" style="width:35%;">
			<option value="id_pdt">Filtrer par</option>
			<?php if($_SESSION[$mail]['niv_role']==3){?>
			<option value="prixht_pdt">Prix</option><?php }else{?>
			<option value="prixttc_pdt">Prix</option> <?php } ?>
			<option value="forme">Forme</option>
			<option value="poids">Poids</option>
			<option value="prix_carat">Prix au carat</option>
		</select>
	</div>
	<br>
	<div id="txtHint">
	<?php
	//la div txtHint qui affiche de base tous les diamants si aucun iltre n'est appliquée
	//fais appel à la fonction component1 ou component2 en fonction de prix à aficher(HT ou TTC) qui est dans component1.php
	$query = "SELECT * FROM produits where type_mat='diamant' ";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{ 
     	echo'<div style="margin-left: 83px;"><table width="100%"><tr>';
     	$nb_elem = 0;

     	 //tant qu'il y a des produits
		 while($row = mysqli_fetch_array($result))
		{	
			//passer à la ligne si on a déjà 4 produits sur la même ligne
			if($nb_elem==4){
				echo'</tr><tr>';
				$nb_elem = 0;
			}

			//afficher les produits avec le prix ht si c'est un professionnel sinon affiche le prix ttc
			if($_SESSION[$mail]['niv_role']==3){
				//fais appel à la fonction component1 ou component2 en fonction de prix à aficher(HT ou TTC) qui est dans component1.php
				component1($row['id_pdt'], $row['nom_pdt'], $row['nom_img'], $row['prixht_pdt']);
			}else{
				component2($row['id_pdt'], $row['nom_pdt'], $row['nom_img'], $row['prixttc_pdt']);
			}
			$nb_elem++;
		}
		echo '</tr></table> </div>';
	}
		 ?>
     </div> 
    <br/>
</html>
