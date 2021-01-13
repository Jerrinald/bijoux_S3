<?php 
require_once('config.php');
require('../menu/menu.php'); ?>

<!----On affiche les professionnels qui ne sont pas encore assigner--->

<h2 style="text-align: center; margin-top: 40px;">Liste des Professionnels à assigner</h2>
<?php
$query = "SELECT * FROM professionnels where assigne=0 ";
$result = mysqli_query($connect, $query);  ?>


<ul style="margin-top: 50px; margin-left: 400px;">
<?php while($row = mysqli_fetch_array($result)){ //un lien href envoie vers la l'assignation à faire sur le client cliqué ?>
	<li><a href="assignation_collabo.php?id=<?php echo $row['id_pro']; ?>"><?php echo "Monsieur " . $row["nom_pro"] . " " . $row["prenom_pro"] . " de la societe " . $row['nom_societe'] . " est plus interesse par les " . $row['interet'] ; ?></a></li>
<?php }

?>
</ul>