<?php
session_start();
require('./menu/menu.php');
require_once ('config.php');
require_once ('component1.php');




if (isset($_POST['add_to_cart'])){
	if (isset($_SESSION['shopping_cart'])){
		$item_array_id= array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id)){
			$count = count($_SESSION["shopping_cart"]);
			$item_array=array(
			'item_id'		=>  $_GET["id"],
			'item_name'		=>  $_POST["hidden_name"],
			'item_price'	=>  $_POST["hidden_price"],
			'item_quantity'	=>  $_POST["quantity"]		
		);
		$_SESSION["shopping_cart"][$count] = $item_array;
		}else{
			echo '<script>alert("Item Already Added")</script>';
		}
	}else{
		$item_array=array(
			'item_id'		=>  $_GET["id"],
			'item_name'		=>  $_POST["hidden_name"],
			'item_price'	=>  $_POST["hidden_price"],
			'item_quantity'	=>  $_POST["quantity"]
		);
		$_SESSION['shopping_cart'][0]=$item_array;
	}
}


if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				//echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart2.php"</script>';
			}
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css" />
</head>
<body>
	<br>
	<h1 style="color:blue; text-align: center;">Le catalogue</h1>
	<br>
	<div class="nav" style="width:20%; margin-left: 150px;">
		<h2>Filtrer</h2>
		<select id="prix" class="product__footer" style="width:35%;">
			<option>Filtrer par</option>
			<option>Forme</option>
			<option>Poids</option>
			<option>Prix au carat</option>
		</select>
	</div>
	<br>
	
	<?php
	/*if(isset($_GET['choix']) === true){
		echo $_GET['choix'];
	}*/
	 /*$q = $_GET['q'];
	 mysqli_select_db($connect,"ajax_demo");
	 var_dump($q);*/
	$query = "SELECT * FROM produits";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{ 
     	echo'<div style="margin-left: 83px;"><table width="100%"><tr>';
     	$nb_elem = 0;

		 while($row = mysqli_fetch_array($result))
		{	
			if($nb_elem==4){
				echo'</tr><tr>';
				$nb_elem = 0;
			}
			component($row['id_pdt'], $row['nom_pdt'], $row['nom_img'], $row['prix_pdt']);
			$nb_elem++;
		}
	}
		echo '</tr></table> </div>';  ?>
        
    

	<br/><div class="cart-btns" style="width:70%; margin-left: 150px;">
	        <div class="continue__shopping">
	            <a href="aperçu.php">Aperçu panier</a>
	        </div>
	        <div class="continue__shopping">
	            <a href="ajouter.php">Ajouter produit</a>
	        </div>
	    </div>
<h3>Order Details</h3>
<div class="table-responsive">
	<table>
		<tr>
			<th width="40%">Item Name</th>
			<th width="10%">Quantity</th>
			<th width="20%">Price</th>
			<th width="15%">Total</th>
			<th width="5%">Action</th>
		</tr>
		<?php

		if(!empty($_SESSION["shopping_cart"])){
			$total = 0;
			foreach($_SESSION["shopping_cart"] as $keys => $values){
				?>
				<tr>
					<td><?php echo $values["item_name"]; ?></td>
					<td><?php echo $values["item_quantity"]; ?></td>
					<td><?php echo $values["item_price"]; ?></td>
					<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
					<td><a href="cart2.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
				</tr><br><br>
				<?php
						$total = $total + ($values["item_quantity"] * $values["item_price"]);
					}
				?>
				<tr>
					<td colspan="3" align="right">Total</td>
					<td align="right">$ <?php echo number_format($total, 2); ?></td>
					<td></td>
				</tr>
				<?php
				}
				?>
	</table>
</div>
</html>