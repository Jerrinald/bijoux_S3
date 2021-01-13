<?php
require_once ('config.php');
require('../menu/menu.php');

//aperçu du panier

//si un produit est supprimer du panier
if(isset($_GET["action"]))
{
	//recoit l'action delete
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION[$mail]["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				//on le suppprime de la session du panier et on decrement le compteur
				$_SESSION[$mail]['compteur']-=1;
				unset($_SESSION[$mail]["shopping_cart"][$keys]);
				//echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="aperçu.php"</script>';
			}
		}
	}
}
?>
<style type="text/css">

table { border-collapse : collapse; margin : auto;  margin-left: 280px;}
td,th { border : 0px; width : 200px; height : 30px; text-align : center;}

p,
label {
    font: 2rem 'Fira Sans', sans-serif;
    margin-top: 65px;
    text-align: center;
}

input {
    margin: .2rem;
    margin-left: 580px;
}

button,
.styled {
	height: 70px;
	width: 180px;
    margin-left: 600px;
    border: 0;
    line-height: 2.5;
    padding: 0 20px;
    font-size: 1rem;
    text-align: center;
    color: #fff;
    text-shadow: 1px 1px 1px #000;
    border-radius: 10px;
    background-color: rgba(0, 0,200, 1);
    background-image: linear-gradient(to top left,
                                      rgba(0, 0, 0, .2),
                                      rgba(0, 0, 0, .2) 30%,
                                      rgba(0, 0, 0, 0));
    box-shadow: inset 2px 2px 3px rgba(255, 255, 255, .6),
                inset -2px -2px 3px rgba(0, 0, 0, .6);
}

.styled:hover {
    background-color: rgba(255, 0, 0, 1);
}

.styled:active {
    box-shadow: inset -2px -2px 3px rgba(255, 255, 255, .6),
                inset 2px 2px 3px rgba(0, 0, 0, .6);
}

</style>

<!---Afficher le panier----->

<br/>
<h3 style="text-align: center; margin-top: 25px;">Details panier</h3>
<div class="table-responsive">
	<table>
		<tr>
			<th>Nom produit</th>
			<th>Quantite</th>
			<th>Prix</th>
			<th>Total</th>
			<th>Action</th>
		</tr>
		<?php
		//affiche tous les produits présents dans le panier avec le nom, la qtité et le prix unitaire et le prix en fonction de la qtité
		if(!empty($_SESSION[$mail]["shopping_cart"])){
			$total = 0;
			foreach($_SESSION[$mail]["shopping_cart"] as $keys => $values){
				?>
				<tr>
					<td><?php echo $values["item_name"]; ?></td>
					<td><?php echo $values["item_quantity"]; ?></td>
					<td><?php echo $values["item_price"]; ?></td>
					<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
					<td><a href="aperçu.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Supprimer</span></a></td>
				</tr><br><br>
				<?php
						$total = $total + ($values["item_quantity"] * $values["item_price"]);
					}
				?>
				<tr>
					<!---affiche le prix total du panier ---->
					<td colspan="4" align="right">Total : <?php echo number_format($total, 2); ?></td>
				</tr>
				<?php
				}
				?>
	</table>

	 <form action="devis.php" method="post">
    <div>
    </div>
    <div>
    </div>
    <br/>
    <div>
    <input type="submit" name="submit" value="Finaliser commande" class="favorite styled" />
    </div>
  </form>

<br/><br/><br/>

<a href="./Devis.pdf" tabindex="-1"><strong>click here</strong></a>


