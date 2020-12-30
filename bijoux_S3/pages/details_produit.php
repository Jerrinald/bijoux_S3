<style type="text/css">
	.details{
		margin-left: 950px;
		margin: -320px 60px 10px 950px;
	}
	input{
		width: 20px;
	}
</style>

<?php
require('../menu/menu.php');
require_once('config.php');

if (isset($_POST['add_to_cart'])){
	if (isset($_SESSION[$mail]['shopping_cart'])){
		$item_array_id= array_column($_SESSION[$mail]["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id)){
			$count = count($_SESSION[$mail]["shopping_cart"]);
			$item_array=array(
			'item_id'		=>  $_GET["id"],
			'item_name'		=>  $_POST["hidden_name"],
			'item_price'	=>  $_POST["hidden_price"],
			'item_quantity'	=>  $_POST["quantity"]		
		);
		$_SESSION[$mail]["shopping_cart"][$count] = $item_array;
		$_SESSION[$mail]['compteur']+=1;
		}else{
			echo '<script>alert("Item deja ajouté")</script>';
		}
	}else{
		$item_array=array(
			'item_id'		=>  $_GET["id"],
			'item_name'		=>  $_POST["hidden_name"],
			'item_price'	=>  $_POST["hidden_price"],
			'item_quantity'	=>  $_POST["quantity"]
		);
		$_SESSION[$mail]['shopping_cart'][0]=$item_array;
		$_SESSION[$mail]['compteur']+=1;
	}
	echo '<script>window.location="aperçu.php"</script>';
}

if(isset($_GET["id"]) and preg_match("/^\d+$/", $_GET["id"])){

	$query = "SELECT * FROM produits where id_pdt=". $_GET["id"];
	$result = mysqli_query($connect, $query);

	while($row = mysqli_fetch_array($result))
		{	
			?> <center><img src="../images/products/<?php echo $row['nom_img']; ?>" alt=""></center>
			<div class="details"><ul><?php
			echo "<li> <h2>Nom du produit : </h2> <br/>" . $row['nom_pdt']. "</li><br/>";
			if($_SESSION[$mail]['niv_role']==3){
				if($row['prixttc_pdt']!=0){
					echo "<li> <h2>Prix du produit : </h2> <br/>" . $row['prixttc_pdt'] . "</li><br/>";
				}else{
					echo "<li> <h2>Prix du produit : </h2> <br/> A preciser </li><br/>";
				}
			}else{
				if($row['prixht_pdt']!=0){
					echo "<li> <h2>Prix du produit : </h2> <br/>" . $row['prixht_pdt'] . "</li><br/>";
				}else{
					echo "<li> <h2>Prix du produit : </h2> <br/> A preciser</li><br/>";
				}
			}
			echo "<li> <h2>Type de matériau : </h2> <br/>" . $row['type_mat'] . "</li><br/>";
			echo "<li> <h2>Forme du produit : </h2> <br/>" . $row['forme'] . "</li><br/>";
			echo "<li> <h2>Poids du produit : </h2> <br/>" . $row['poids'] . "</li><br/>";
			echo "<li> <h2>Prix au carat du produit : </h2> <br/>" . $row['prix_carat'] . "</li><br/>";
			?></ul></div>
			<form method="post" name="ajout" action="?action=add&id=<?php echo $_GET["id"] ?> ">
				<input type="hidden" name="hidden_name" value="<?php echo $row['nom_pdt']; ?>">
				<input type="hidden" name="hidden_price" value="<?php echo $row['prix_pdt']; ?>"> 
				<div class="input-counter" style="margin-top: -90px; padding-left: 600px; margin-bottom: -10px;">
                    <div>
                        <span class="minus-btn">
                            <svg>
                                <use xlink:href="../images/sprite.svg#icon-minus"></use>
                            </svg>
                        </span>
                        <input type="text" min="1" name="quantity" value="1" max="10" class="counter-btn">
                        <span class="plus-btn">
                            <svg>
                                <use xlink:href="../images/sprite.svg#icon-plus"></use>
                            </svg>
                        </span>
                    </div>
                </div>  
				<input type="submit" value="Ajouter" name="add_to_cart" class="product__btn" style="width:25%; margin-left: 490px;">
			</form> <?php 
		}

}

if($_SESSION[$mail]['niv_role']==3){
	if($row['prixttc_pdt']!=0){
		echo "<li> <h2>Prix du produit : </h2> <br/>" . $row['prixttc_pdt'] . "</li><br/>";
	}else{
		echo "<li> <h2>Prix du produit : </h2> <br/> A preciser </li><br/>";
	}
}else{
	if($row['prixht_pdt']!=0){
		echo "<li> <h2>Prix du produit : </h2> <br/>" . $row['prixht_pdt'] . "</li><br/>";
	}else{
		echo "<li> <h2>Prix du produit : </h2> <br/> A preciser</li><br/>";
	}
}
?>
