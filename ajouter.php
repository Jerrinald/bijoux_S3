<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style1.css" />
</head>
<body>
<?php
require_once('config.php');
if (isset($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['img'], $_REQUEST['price'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$id = stripslashes($_REQUEST['id']);
	$id = mysqli_real_escape_string($connect, $id); 
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$name = stripslashes($_REQUEST['name']);
	$name = mysqli_real_escape_string($connect, $name);
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$img = stripslashes($_REQUEST['img']);
	$img = mysqli_real_escape_string($connect, $img);

	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$price = stripslashes($_REQUEST['price']);
	$price = mysqli_real_escape_string($connect, $price);
	//requéte SQL + mot de passe crypté
    $query = "INSERT into `tbl_product` (id, name, image, price)
              VALUES ('$id', '$name', '$img', '$price')";
	// Exécute la requête sur la base de données
    $res = mysqli_query($connect, $query);
    if($res){
       echo "<div class='continue__shopping'>
             <h3>Ajout réussi</h3>
             <p>Cliquez ici pour <a href='cart2.php'>revenir</a></p>
			 </div>";
    }
}else{
?>
<form action="" method="post">
	<h1><a href="https://waytolearnx.com/">WayToLearnX.com</a></h1>
    <h1>S'inscrire</h1>
	<input type="text" name="id" placeholder="ID" required />
    <input type="text"name="name" placeholder="nom" required />
    <input type="text" name="img" placeholder="image" required />
    <input type="text" name="price" placeholder="prix" required />
    <input type="submit" name="submit" value="Ajouter"/>
</form>
<?php } ?>
</body>
</html>