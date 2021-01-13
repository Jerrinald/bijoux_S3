<?php 

session_start();

require_once('config.php');
require_once ('component1.php');




//récupère le résultat du filtre et trie en fonction de ce dernier
$que = "SELECT * FROM produits where type_mat='diamant' ORDER BY ".$_GET['q'];
$res = mysqli_query($connect, $que);

//affichage de cette requete
if(mysqli_num_rows($res) > 0)
{ 
 	echo'<div style="margin-left: 83px;"><table width="100%"><tr>';
 	$nb_elem = 0;

 	 //tant qu'il y a des produits
	 while($row = mysqli_fetch_array($res))
	{	
		//passer à la ligne si on a déjà 4 produits sur la même ligne
		if($nb_elem==4){
			echo'</tr><tr>';
			$nb_elem = 0;
		}

		//fait appel à la fonction component1 ou component2 qui permet d'afficher chaque produit qui ressort du résultat de la requête
		component2($row['id_pdt'], $row['nom_pdt'], $row['nom_img'], $row['prixttc_pdt']);

		$nb_elem++;
	}
	echo '</tr></table> </div>';
}



?>


