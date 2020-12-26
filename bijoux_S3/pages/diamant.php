<?php
require('../menu/menu.php');
require_once ('config.php');
require_once ('component1.php');


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
	echo '<script>window.location="diamant.php"</script>';
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
				echo '<script>window.location="diamant.php"</script>';
			}
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<script>
	function showUser(str) {
	  if (str == "") {
	    document.getElementById("txtHint").innerHTML = "";
   		return;
	  } else {
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
	        document.getElementById("txtHint").innerHTML = this.responseText;
	      }
	    };
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
		<select class="product__footer" id="users" name="users" onchange="showUser(this.value)" style="width:35%;">
			<option value="id_pdt">Filtrer par</option>
			<option value="prix_pdt">Prix</option>
			<option value="forme">Forme</option>
			<option value="poids">Poids</option>
			<option value="prix_carat">Prix au carat</option>
		</select>
	</div>
	<br>
	<div id="txtHint">
	<?php
	$query = "SELECT * FROM produits where type_mat='diamant' ";
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
		echo '</tr></table> </div>';
	}
		 ?>
     </div> 
    <br/>
</html>
