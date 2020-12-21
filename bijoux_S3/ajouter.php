<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./registration1/style1.css" />
</head>
<body>
<?php
require('./menu/menu.php');
require_once('config.php');
if(isset($_REQUEST['name'], $_REQUEST['price'], $_REQUEST['quantity'], $_REQUEST['type_mat'], $_REQUEST['img'], $_REQUEST['forme'], $_REQUEST['poids'], $_REQUEST['prix_carat'])){


	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$name = stripslashes($_REQUEST['name']);
	$name = mysqli_real_escape_string($connect, $name);

	// récupérer le  et supprimer les antislashes ajoutés par le formulaire
	$price = stripslashes($_REQUEST['price']);
	$price = mysqli_real_escape_string($connect, $price);

	// récupérer le  et supprimer les antislashes ajoutés par le formulaire
	$quantity = stripslashes($_REQUEST['quantity']);
	$quantity = mysqli_real_escape_string($connect, $quantity);

	// récupérer le  et supprimer les antislashes ajoutés par le formulaire
	$mat = stripslashes($_REQUEST['type_mat']);
	$mat = mysqli_real_escape_string($connect, $mat);

	// récupérer le  et supprimer les antislashes ajoutés par le formulaire
	$img = stripslashes($_REQUEST['img']);
	$img = mysqli_real_escape_string($connect, $img);

	// récupérer le  et supprimer les antislashes ajoutés par le formulaire
	$forme = stripslashes($_REQUEST['forme']);
	$forme = mysqli_real_escape_string($connect, $forme);

	// récupérer le  et supprimer les antislashes ajoutés par le formulaire
	$poids = stripslashes($_REQUEST['poids']);
	$poids = mysqli_real_escape_string($connect, $poids);

	// récupérer le  et supprimer les antislashes ajoutés par le formulaire
	$carat = stripslashes($_REQUEST['prix_carat']);
	$carat = mysqli_real_escape_string($connect, $carat);

	if(isset($_GET["id"])){
		$query = "UPDATE `produits` SET nom_pdt=". $name . ", prix_pdt=". $price . ", quantite=". $quantity . ", type_mat=" . $mat . ", nom_img=". $img . ", forme=". $forme . ", poids=". $poids . ", prix_carat=" . $carat . "where id_pdt=". $_GET["id"];
		$res = mysqli_query($connect, $query);
		if($res){
	       echo "<div class='continue__shopping'>
	             <h3>Update réussi</h3>
	             <p>Cliquez ici pour <a href='modifier.php'>revenir</a></p>
				 </div>";
	    }else{
	    	echo "<h3>Erreur lors de l'update</h3><p>Cliquez ici pour <a href='ajouter.php'>revenir</a></p>";
	    }
 	}else{

	    $query = "INSERT into `produits` (`nom_pdt`, `prix_pdt`, `quantite`,`type_mat`,`nom_img`, `forme`, `poids`, `prix_carat`)
	              VALUES ('$name', '$price','$quantity','$mat', '$img', '$forme', '$poids', '$carat')";

		// Exécute la requête sur la base de données
	    $res = mysqli_query($connect, $query);
	    if($res){
	       echo "<div class='continue__shopping'>
	             <h3>Ajout réussi</h3>
	             <p>Cliquez ici pour <a href='ajouter.php'>revenir</a></p>
				 </div>";
	    }else{
	    	echo "<h3>Erreur lors de l'ajout</h3><p>Cliquez ici pour <a href='ajouter.php'>revenir</a></p>";
	    }
	}
}else{

	if(isset($_GET["id"])){

		$mod = "SELECT * FROM produits where id_pdt=". $_GET["id"];
		$result = mysqli_query($connect, $mod);
		$row = mysqli_fetch_array($result);
		?>
		<br/><h2 style="margin-left: 50px; text-align: center;">Ajouter/Mise à jour</h2>
		<form class="box" action="" method="post">
			<br><br>
		    <input type="text"name="name" value="<?php echo $row["nom_pdt"] ?>" placeholder="nom" required />
		    <input type="text" name="price" value="<?php echo $row["prix_pdt"] ?>" placeholder="prix" required />
		    <input type="text" name="quantity" value="<?php echo $row["quantite"] ?>" placeholder="quantité" required />
		    <input type="text" name="type_mat" value="<?php echo $row["type_mat"] ?>" placeholder="matériau" required />
		    <input type="text" name="img" value="<?php echo $row["nom_img"] ?>" placeholder="image" required />
		    <input type="text" name="forme" value="<?php echo $row["forme"] ?>" placeholder="forme" required />
		    <input type="text" name="poids" value="<?php echo $row["poids"] ?>" placeholder="poids" required />
		    <input type="text" name="prix_carat" value="<?php echo $row["prix_carat"] ?>" placeholder="prix au carat" required />
		    <br/><input type="submit" name="submit" value="Envoyer"/>
		</form>	
		<?php
	}else{
?>
<br/><h2 style="margin-left: 50px; text-align: center;">Ajouter/Mise à jour</h2>
<form class="box" action="" method="post">
	<br><br>
    <input type="text"name="name" placeholder="nom" required />
    <input type="text" name="price" placeholder="prix" required />
    <input type="text" name="quantity" placeholder="quantité" required />
    <input type="text" name="type_mat" placeholder="matériau" required />
    <input type="text" name="img" placeholder="image" required />
    <input type="text" name="forme" placeholder="forme" required />
    <input type="text" name="poids" placeholder="poids" required />
    <input type="text" name="prix_carat" placeholder="prix au carat" required />
    <br/><input type="submit" name="submit" value="Envoyer"/>
</form>
<?php } } ?>
</body>
</html>