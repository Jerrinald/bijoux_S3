<?php
session_start();
require('./menu/menu.php');
require_once ('config.php');


if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		$del = "DELETE FROM produits where id_pdt=". $_GET["id"];
		$res = mysqli_query($connect, $del);
		if($res)
		{
			echo '<script>alert("Produit supprimer")</script>';
			echo '<script>window.location="modifier.php"</script>';
		}
	}

	/*if($_GET["action"] == "modify")
	{
	
	}*/
}
?>
<h1 style="text-align: center; margin-top: 100px;">Liste des produits</h1><br/>
<table style="margin-left: 170px;">
<tr >
    <th style="width: 35px;"> Id </th>
    <th> Nom </th>
    <th style="width: 80px;"> Prix </th>
    <th style="width: 80px;"> Quantité</th>
    <th style="width: 80px;"> Matériau</th>
    <th style="width: 100px;"> Nom image</th>
    <th style="width: 70px;"> Forme</th>
    <th style="width: 65px;"> Poids</th>
    <th style="width: 110px;"> Prix au carat</th>
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
		        <td style="width: 175px;"> <?php echo $row['nom_pdt'] ?> </td>
		        <td> <?php echo $row['prix_pdt']?> </td>
		        <td> <?php echo $row['quantite']?> </td>
		        <td> <?php echo $row['type_mat']?> </td>
		        <td> <?php echo $row['nom_img']?> </td>
		        <td> <?php echo $row['forme']?> </td>
		        <td> <?php echo $row['poids']?> </td>
		        <td> <?php echo $row['prix_carat']?> </td>
		        <td style="width: 85px;"> 
		            <a href="ajouter.php?action=modify&id=<?php echo $row["id_pdt"]; ?>">Modifier</a>
		        </td>
		        <td> 
		            <a href="modifier.php?action=delete&id=<?php echo $row["id_pdt"]; ?>">Supprimer</a>
		        </td>
		    </tr>
		    <?php
		}
	}
?>
</table>


