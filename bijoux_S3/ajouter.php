<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style1.css" />
</head>
<body>
<?php
require('./menu/menu.php');
require_once('config.php');
if(isset($_REQUEST['name'], $_REQUEST['price'], $_REQUEST['quantity'], $_REQUEST['type_mat'], $_REQUEST['img'], $_REQUEST['forme'], $_REQUEST['poids'], $_REQUEST['prix_carat'])){

	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$name = stripslashes($_REQUEST['name']);
	$name = mysqli_real_escape_string($conn, $name);

	// récupérer le  et supprimer les antislashes ajoutés par le formulaire
	$price = stripslashes($_REQUEST['price']);
	$price = mysqli_real_escape_string($conn, $price);

	// récupérer le  et supprimer les antislashes ajoutés par le formulaire
	$quantity = stripslashes($_REQUEST['quantity']);
	$quantity = mysqli_real_escape_string($conn, $quantity);

	// récupérer le  et supprimer les antislashes ajoutés par le formulaire
	$mat = stripslashes($_REQUEST['type_mat']);
	$mat = mysqli_real_escape_string($conn, $mat);

	// récupérer le  et supprimer les antislashes ajoutés par le formulaire
	$img = stripslashes($_REQUEST['img']);
	$img = mysqli_real_escape_string($conn, $img);

	// récupérer le  et supprimer les antislashes ajoutés par le formulaire
	$forme = stripslashes($_REQUEST['forme']);
	$forme = mysqli_real_escape_string($conn, $forme);

	// récupérer le  et supprimer les antislashes ajoutés par le formulaire
	$poids = stripslashes($_REQUEST['poids']);
	$poids = mysqli_real_escape_string($conn, $poids);

	// récupérer le  et supprimer les antislashes ajoutés par le formulaire
	$carat = stripslashes($_REQUEST['prix_carat']);
	$carat = mysqli_real_escape_string($conn, $carat);

    $query = "INSERT into `produits` (`nom_pdt`, `prix_pdt`, `quantite`,`type_mat`,`nom_img`, `forme`, `poids`, `prix_carat`)
              VALUES ($name', '$price','$quantity','$mat', '$img', '$forme', '$poids', '$carat')";

	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='continue__shopping'>
             <h3>Ajout réussi</h3>
             <p>Cliquez ici pour <a href='cart2.php'>revenir</a></p>
			 </div>";
    }
}else{
?>
<br/><h2 style="margin-left: 50px;">Ajouter</h2>
<form action="" method="post">
	<br><br>
    <input type="text"name="name" placeholder="nom" required />
    <input type="text" name="price" placeholder="prix" required />
    <input type="text" name="quantity" placeholder="quantité" required />
    <input type="text" name="type_mat" placeholder="matériau" required />
    <input type="text" name="img" placeholder="image" required />
    <input type="text" name="forme" placeholder="forme" required />
    <input type="text" name="poids" placeholder="poids" required />
    <input type="text" name="prix_carat" placeholder="prix au carat" required />
    <input type="submit" name="submit" value="Ajouter"/>
</form>
<?php } ?>
</body>
</html>
