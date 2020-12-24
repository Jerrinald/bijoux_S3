<?php
require_once ('config.php');
require('../menu/menu.php');

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION[$mail]["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
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

.styled {
	margin-left: 600px;
	margin-top: 50px;
    border: 0;
    line-height: 2.5;
    padding: 10 20px;
    font-size: 1rem;
    text-align: center;
    color: #fff;
    text-shadow: 1px 1px 1px #000;
    border-radius: 10px;
    background-color: rgba(220, 0, 0, 1);
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
					<td colspan="4" align="right">Total : <?php echo number_format($total, 2); ?></td>
				</tr>
				<?php
				}
				?>
	</table>

	<input class="favorite styled"        type="button"        value="Finalisez commande">
