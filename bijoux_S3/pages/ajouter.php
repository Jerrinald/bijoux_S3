<body>
<?php
require('../menu/menu.php');
require_once('config.php');
if(isset($_REQUEST['name'], $_REQUEST['type_mat'], $_FILES['img']) and !empty($_FILES['img']['name'])){

	//récuperer image
	$tailleMax=2097152;
	$extensionsValides=array('jpg', 'jpeg', 'gif', 'png');
	if ($_FILES['img']['name'] <= $tailleMax) {
		$extensionsUpload = strtolower(substr(strrchr($_FILES['img']['name'], '.'), 1));
		if (in_array($extensionsUpload, $extensionsValides)) {
			$chemin = "../images/products/". $_FILES['img']['name'];
			$resultat = move_uploaded_file($_FILES['img']['tmp_name'], $chemin);
			$img = $_FILES['img']['name'];
		}
	}

	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$name = stripslashes($_REQUEST['name']);
	$name = mysqli_real_escape_string($connect, $name);

	if(isset($_REQUEST['priceHT']) && !empty($_REQUEST['priceHT'])){
		// récupérer le  et supprimer les antislashes ajoutés par le formulaire
		$priceHt = stripslashes($_REQUEST['priceHT']);
		$priceHt = mysqli_real_escape_string($connect, $priceHt);}
	else{
		$priceHt = 0;
	}

	if(isset($_REQUEST['priceTTC']) && !empty($_REQUEST['priceTTC'])){
		// récupérer le  et supprimer les antislashes ajoutés par le formulaire
		$priceTtc = stripslashes($_REQUEST['priceTTC']);
		$priceTtc = mysqli_real_escape_string($connect, $priceTtc);}
	else{
		$priceTtc = 0;
	}

	if(isset($_REQUEST['quantity']) && !empty($_REQUEST['quantity'])){
		// récupérer le  et supprimer les antislashes ajoutés par le formulaire
		$quantity = stripslashes($_REQUEST['quantity']);
		$quantity = mysqli_real_escape_string($connect, $quantity);}
	else{
		$quantity = 0;
	}

	if(isset($_REQUEST['type_mat']) && !empty($_REQUEST['type_mat'])){
		// récupérer le  et supprimer les antislashes ajoutés par le formulaire
		$mat = stripslashes($_REQUEST['type_mat']);
		$mat = mysqli_real_escape_string($connect, $mat);}
	else{
		$mat = 'A preciser';
	}

	if(isset($_REQUEST['forme']) && !empty($_REQUEST['forme'])){
		// récupérer le  et supprimer les antislashes ajoutés par le formulaire
		$forme = stripslashes($_REQUEST['forme']);
		$forme = mysqli_real_escape_string($connect, $forme);}
	else{
		$forme = 'A preciser';
	}

	if(isset($_REQUEST['poids']) && !empty($_REQUEST['poids'])){
		// récupérer le  et supprimer les antislashes ajoutés par le formulaire
		$poids = stripslashes($_REQUEST['poids']);
		$poids = mysqli_real_escape_string($connect, $poids);}
	else{
		$poids = 'A preciser';
	}

	if(isset($_REQUEST['prix_carat']) && !empty($_REQUEST['prix_carat'])){
		// récupérer le  et supprimer les antislashes ajoutés par le formulaire
		$carat = stripslashes($_REQUEST['prix_carat']);
		$carat = mysqli_real_escape_string($connect, $carat);}
	else{
		$carat = 'A preciser';
	}


	if(isset($_GET["id"])){
		$query = "UPDATE `produits` SET nom_pdt=". $name . ", prixht_pdt=". $price . ", quantite=". $quantity . ", type_mat=" . $mat . ", nom_img=". $img . ", forme=". $forme . ", poids=". $poids . ", prix_carat=" . $carat . "where id_pdt=". $_GET["id"];
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

	    $query = "INSERT into `produits` (`nom_pdt`, `prixht_pdt`, `prixttc_pdt`, `quantite`,`type_mat`,`nom_img`, `forme`, `poids`, `prix_carat`)
	              VALUES ('$name', '$priceHt', '$priceTtc', '$quantity', '$mat', '$img', '$forme', '$poids', '$carat')";

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
		    <input type="text"name="name" value="<?php echo $row["nom_pdt"] ?>" placeholder="nom" />
		    <input type="text" name="price" value="<?php echo $row["prixht_pdt"] ?>" placeholder="prix HT" />
		    <input type="text" name="price" value="<?php echo $row["prixttc_pdt"] ?>" placeholder="prix TTC" />
		    <input type="text" name="quantity" value="<?php echo $row["quantite"] ?>" placeholder="quantité" />
		    <input type="text" name="type_mat" value="<?php echo $row["type_mat"] ?>" placeholder="matériau" />
		    <input type="file" name="img" value="<?php echo $row["nom_img"] ?>" placeholder="image" />
		    <input type="text" name="forme" value="<?php echo $row["forme"] ?>" placeholder="forme" />
		    <input type="text" name="poids" value="<?php echo $row["poids"] ?>" placeholder="poids" />
		    <input type="text" name="prix_carat" value="<?php echo $row["prix_carat"] ?>" placeholder="prix au carat" />
		    <br/><input type="submit" name="submit" value="Envoyer"/>
		</form>	
		<?php
	}else{
?>
<br/><h2 style="margin-left: 50px; text-align: center;">Ajouter/Mise à jour</h2>
<form class="box" action="" method="post" enctype="multipart/form-data">
	<br><br>
    <input type="text"name="name" placeholder="nom" required />
    <input type="text" name="priceHT" placeholder="prix hors taxes" />
    <input type="text" name="priceTTC" placeholder="prix TTC" />
    <input type="text" name="quantity" placeholder="quantité" />
    <input type="text" name="type_mat" placeholder="matériau" required /><br/>
    <label>Image :</label><input type="file" name="img" />
    <input type="text" name="forme" placeholder="forme" />
    <input type="text" name="poids" placeholder="poids" />
    <input type="text" name="prix_carat" placeholder="prix au carat" />
    <br/><input type="submit" name="submit" value="Envoyer"/>
</form>
<?php } } ?>

<div style=" color: red; width: 190px; position:absolute; top:180px; left:90px;">
<h3>Veuillez renseigner au minimum le nom, l'image et le matériau(pierre ou diamant) lors d'un nouvel ajout</h2>	
</div>
</body>
</html>