<?php
require('../menu/menu.php');
require_once ('config.php');


if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		$del = "DELETE FROM produits where id_pdt=". $_GET["id"];
		$res = mysqli_query($connect, $del);
		if($res)
		{
			echo '<script>alert("Produit supprime")</script>';
			echo '<script>window.location="modifier.php"</script>';
		}
	}

	/*if($_GET["action"] == "modify")
	{
	
	}*/
}
?>
<style type="text/css">
table { border-collapse : collapse; margin : auto;}
td,th { border : 1px solid black; width : 200px; height : 30px; text-align : center;}
.sansBordure { border : 0px; width : 90px; padding-left : 0px;}
</style>

<h1 style="text-align: center; margin-top: 100px;">Liste des produits</h1><br/>
<table>
<tr >
    <th> Id </th>
    <th> Nom </th>
    <th> Prix </th>
    <th> Quantité</th>
    <th> Matériau</th>
    <th> Nom image</th>
    <th> Forme</th>
    <th> Poids</th>
    <th> Prix au carat</th>
</tr>

<?php $query = "SELECT * FROM produits ";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		 while($row = mysqli_fetch_array($result))
		{	
			?>
			<tr>
		        <td> <?php echo $row['id_pdt'] ?> </td>
		        <td> <?php echo $row['nom_pdt'] ?> </td>
		        <td> <?php echo $row['prix_pdt']?> </td>
		        <td> <?php echo $row['quantite']?> </td>
		        <td> <?php echo $row['type_mat']?> </td>
		        <td> <?php echo $row['nom_img']?> </td>
		        <td> <?php echo $row['forme']?> </td>
		        <td> <?php echo $row['poids']?> </td>
		        <td> <?php echo $row['prix_carat']?> </td>
		        <td class="sansBordure"> 
		            <a href="ajouter.php?action=modify&id=<?php echo $row["id_pdt"]; ?>">Modifier</a>
		        </td>
		        <td class="sansBordure"> 
		            <a href="modifier.php?action=delete&id=<?php echo $row["id_pdt"]; ?>">Supprimer</a>
		        </td>
		    </tr>
		    <?php
		}
	}
?>
</table>


