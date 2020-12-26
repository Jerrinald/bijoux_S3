<?php 
require_once('config.php');
require_once ('component1.php');



$que = "SELECT * FROM produits where type_mat='pierre' ORDER BY ".$_GET['q'];
$res = mysqli_query($connect, $que);

if(mysqli_num_rows($res) > 0)
{ 
 	echo'<div style="margin-left: 83px;"><table width="100%"><tr>';
 	$nb_elem = 0;

	 while($row = mysqli_fetch_array($res))
	{	
		if($nb_elem==4){
			echo'</tr><tr>';
			$nb_elem = 0;
		}
		component($row['id_pdt'], $row['nom_pdt'], $row['nom_img'], $row['prix_pdt']);
		$nb_elem++;
	}
	echo '</tr></table> </div>';
}



?>
