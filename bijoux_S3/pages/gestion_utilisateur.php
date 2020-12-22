<?php
session_start();
require('../menu/menu.php');
require_once ('config.php');
?>
<style type="text/css">
table { border-collapse : collapse; margin : auto;  margin-left: 300px;}
td,th { border : 1px solid black; width : 200px; height : 30px; text-align : center;}
.sansBordure { border : 0px; width : 90px; padding-left : 0px;}
</style>

<h1 style="text-align: center; margin-top: 100px;">Liste des utlisateurs</h1><br/>
<table>
<tr >
    <th> Id </th>
    <th> Nom </th>
    <th > Prenom </th>
    <th> Rôle</th>
    
</tr>

<?php $query = "SELECT * FROM users ";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		 while($row = mysqli_fetch_array($result))
		{	
			?>
			<tr>
		        <td> <?php echo $row['id_user'] ?> </td>
		        <td> <?php echo $row['nom'] ?> </td>
		        <td> <?php echo $row['prenom']?> </td>
		        <?php if($row['niv_role']==1){?>
		        	<td> Administrateur </td>
		        <?php }elseif ($row['niv_role']==2) {?>
		        	<td> Profesionnel </td>
		        <?php }else{?>
		        	<td> Particulier </td>
		        <?php } ?>
		        <td class="sansBordure"> 
		            <a href="">Modifier</a>
		        </td>
		        <td class="sansBordure"> 
		            <a href="">Supprimer</a>
		        </td>
		    </tr>
		    <?php
		}
	}
?>
</table>