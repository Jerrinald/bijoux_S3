<?php
require('../menu/menu.php');
require_once('config.php');

require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

if($_SESSION[$mail]['niv_role']==1){
	header("Location: login.php");
}else{

	if(empty($_SESSION[$mail]["shopping_cart"])){
		echo "panier vide";
	}else{


		ob_start();
		$client=$mail;

		if($_SESSION[$mail]['niv_role']==3){

			$cl_req = "SELECT * from professionnels where adr_mail_pro='$client'";
			$result=mysqli_query($connect, $cl_req);
			$row = mysqli_fetch_array($result);

		    $nom = $row['nom_pro'];
		    $prenom = $row['prenom_pro'];
		    $cl_adr = $row['adr_mail_pro'];
		    $societe = $row['nom_societe'];
		   	$siret = $row['num_siret'];

		}elseif ($_SESSION[$mail]['niv_role']==2) {

			$cl_req = "SELECT * from particuliers where adr_mail_part='$client'";
			$result=mysqli_query($connect, $cl_req);
			$row = mysqli_fetch_array($result);

		    $nom = $row['nom_part'];
		    $prenom = $row['prenom_part'];
		    $cl_adr = $row['adr_mail_part'];

			}

		 ?>

		<style type="text/css">
			table { 
		        width: 100%; 
		        color: #717375; 
		        font-family: helvetica; 
		        line-height: 5mm; 
		        border-collapse: collapse; 
		    }
		    h2 { margin: 0; padding: 0; }
		    p { margin: 5px; }
		 
		    .border th { 
		        border: 1px solid #000;  
		        color: white; 
		        background: #000; 
		        padding: 5px; 
		        font-weight: normal; 
		        font-size: 14px; 
		        text-align: center; 
		        }
		    .border td { 
		        border: 1px solid #CFD1D2; 
		        padding: 5px 10px; 
		        text-align: center; 
		    }
		    .no-border { 
		        border-right: 1px solid #CFD1D2; 
		        border-left: none; 
		        border-top: none; 
		        border-bottom: none;
		    }
		    .space { padding-top: 250px; }
		 
		    .10p { width: 10%; } .15p { width: 15%; } 
		    .25p { width: 25%; } .50p { width: 50%; } 
		    .60p { width: 60%; } .75p { width: 75%; }
		</style>


		<page backtop="20mm" backleft="10mm" backright="10mm" backbottom="30mm">
			<table style="vertical-align: top;">
		        <tr>
		            <td class="75p">
		                <strong><?php echo $nom . " " . $prenom; ?></strong><br />
		                <?php if(isset($societe)){echo $societe . "<br />";}else{echo "";} ?>
		                <?php if(isset($siret)){?><strong>SIRET:</strong> <?php echo $siret . "<br />";}else{echo "";} ?>
		                <?php echo $cl_adr; ?>
		            </td>
		            <td class="25p">
		                <strong><?php echo "Service+ Diamant"; ?></strong><br />
		                <?php echo "Belgique, 13 rue du pavillon"; ?><br />
		            </td>
		        </tr>
		    </table>

			<table style="margin-top: 50px;">
		        <tr>
		            <td class="50p"><h2></h2></td>
		            <td class="50p" style="text-align: right;">Emis le <?php echo date("d/m/y"); ?></td>
		        </tr>
		        <tr>
		            <td style="padding-top: 15px;" colspan="2"><strong>Bonjour, voici le détail de votre devis :</strong></td>
		        </tr>
		    </table>
			<table style="margin-top: 30px;" class="border">
		        <thead>
		            <tr>
		                <th class="60p">Description</th>
		                <th class="10p">Quantité</th>
		                <th class="15p">Prix Unitaire</th>
		                <th class="15p">Montant</th>
		            </tr>
		        </thead>
		        <tbody>
		        	<?php $total = 0;
					foreach($_SESSION[$mail]["shopping_cart"] as $keys => $values){
						?>
						<tr>
							<td><?php echo $values["item_name"]; ?></td>
							<td><?php echo $values["item_quantity"]; ?></td>
							<td><?php echo $values["item_price"]; ?></td>
							<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
							<?php
								$total = $total + ($values["item_quantity"] * $values["item_price"]);
							?>
						</tr>
					<?php } ?>

					<tr>
		                <td class="space"></td>
		                <td></td>
		                <td></td>
		                <td></td>
		            </tr>
					<tr>
		                <td colspan="2" class="no-border"></td>
		                <td style="text-align: center;" rowspan="3"><strong>Total:</strong></td>
		                <td><?php echo number_format($total, 2); ?></td>
		            </tr>
			    </tbody>
	        </table>
		</page>

		<?php

		$content = ob_get_clean();
	    try {
	        $pdf = new HTML2PDF("p","A4","fr");
	        $pdf->writeHTML($content);
	        ob_get_clean();
	        $pdf->Output('Devis.pdf');
	        //$pdf->Output('C:/wamp64/www/service_plus_diamant/bijoux_S3/bijoux_S3/pages/Devis.pdf', 'F');
	        //$pdf->Output('http://localhost/service_plus_diamant/bijoux_S3/bijoux_S3/pages/Devis.pdf', 'F');
	    } catch (HTML2PDF_exception $e) {
	        die($e);
	    }
	}
}
?>


