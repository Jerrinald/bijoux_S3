<?php

require_once ('./config.php');
require('../menu/menu.php');

/*---------------------------------------------------------------*/
/*
    Titre : Moteur de recherche basique 
    ya des anotations remplace par ce qu'il faut stp                                                                         
                                                                                                                                                                                                       
*/
/*---------------------------------------------------------------*/
if(isset($_POST["search"])){
	$query = "SELECT * FROM produits where type_mat='" . $_POST["recherche"] . "'";
	$result = mysqli_query($connect, $query);
	while($row = mysqli_fetch_array($result)){
		echo "<a href=index.php>" . $row['nom_pdt'] . "</a><br/><br/>";
	}
}else{

?>

     <html>
     <form method="POST" action="" style="margin-top: 55px; margin-left: 350px;"> 
     Rechercher un mot : <input type="text" name="recherche">
     <input type="SUBMIT" name="search" value="Rechercher"> 
     </form>
     </html>
<?php }
?>
     