<?php
require('../menu/menu.php');
require_once('config.php');

require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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

		   	if($row['assigne']==0){
		   		header("Location: aperçu.php");
		   	}

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
		 
		 	.coord td{  border: 1px solid #CFD1D2; 
		        padding: 5px 10px; 
		        text-align: center; 
		          width: 22%; border-radius: 10px;}
		    .first td{
		    	border: 1px solid #CFD1D2; 
		        padding: 5px 5px; 
		        text-align: center; 
		          width: 22%;
		          border-bottom: none;
		    }

		    .10p { width: 10%; } .15p { width: 15%; } 
		    .25p { width: 25%; } .50p { width: 50%; } 
		    .60p { width: 60%; } .75p { width: 75%; }
		</style>

		<page backtop="5mm" backleft="10mm" backright="10mm" backbottom="30mm">
			<strong style="font-size: 15px;"><?php echo "Service+ Diamant"; ?><br />
				<?php echo "Belgique, 13 rue du pavillon";  ?></strong>
			<table style="margin-top: -45px; margin-left: 260px;" class="coord">
				<tr><td><h4 style="position: absolute; margin-top: 30px;">Devis n°</h4></td></tr>
			</table>
			<table style="position: absolute; top: 25px; margin-left: 260px;" class="first">
				<tr><td><p>Salut</p></td></tr>
			</table>
			<table style="margin-top: -69px; margin-left: 418px;" class="coord">
				<tr><td><h4 style="position: absolute; margin-top: 30px;">Date</h4></td></tr>
			</table>
			<table style="position: absolute; top: 25px; margin-left: 418px;" class="first">
				<tr><td><p><?php echo date("d/m/y"); ?></p></td></tr>
			</table>
			<table style="margin-top: -69px; margin-left: 578px;" class="coord">
				<tr><td><h4 style="position: absolute; margin-top: 30px;">Client</h4></td></tr>
			</table>
			<table style="position: absolute; top: 25px; margin-left: 578px;" class="first">
				<tr><td><p><?php echo $nom . " " . $prenom; ?></p></td></tr>
			</table>
			<table style="vertical-align: top;">
		        <tr>
		            <td class="75p"><br/><br/>
		                <?php echo "Tel :"; ?><br/>
		                <?php echo "Fax :"; ?><br/>
		                <?php echo "R.C.S :"; ?><br/>
		                <?php echo "SIRET :"; ?><br/>
		                <?php echo "N/id CEE :"; ?><br/>
		            </td>
		        </tr>
		    </table>
		    <table style="margin-left: 455px;">
		        <tr>
		            <td>
		                <strong><?php echo $nom . " " . $prenom; ?></strong><br />
		                <?php if(isset($societe)){echo $societe . "<br />";}else{echo "";} ?>
		                <?php if(isset($siret)){?><strong>SIRET:</strong> <?php echo $siret . "<br />";}else{echo "";} ?>
		                <?php echo $cl_adr; ?>
		            </td>
		        </tr>
		    </table>
			<table style="margin-top: 50px;">
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
	        //$pdf->Output('Devis.pdf', 'S');
	        //$pdf->Output('C:/wamp64/www/service_plus_diamant/bijoux_S3/bijoux_S3/devis/Devis.pdf', 'F');
	    } catch (HTML2PDF_exception $e) {
	        die($e);
	    }

	    // Instantiation and passing `true` enables exceptions
		$mail1 = new PHPMailer();

		$mail1->IsSMTP(); // active SMTP

		$mail1->SMTPOptions = [
		  'ssl' => [
		    'verify_peer' => false,
		    'verify_peer_name' => false,
		    'allow_self_signed' => true
		  ]
		];

		/*$mail1->SMTPDebug = SMTP::DEBUG_OFF; // debogage: 1 = Erreurs et messages, 2 = messages seulement
		$mail1->Host = "SMTP.office365.com";
		$mail1->SMTPAuth = true;  // Authentification SMTP active
		//$mail->SMTPSecure = 'ssl'; // Gmail REQUIERT Le transfert securise
		$mail1->SMTPSecure = "TLS";
		$mail1->Port = 587;
		$mail1->Username = "";
		$mail1->Password = "";
		$mail1->SetFrom('jerrinald95190@live.fr', 'Votre devis');
		//$mail->addReplyTo('k.jerrinald@gmail.com', 'First Last');
		$mail1->Subject = 'Le devis concernant votre commande sur le site de service+diamant';
		$mail1->Body = 'Bonjour voici votre devis ci-joint en PDF.';
		//$mail->msgHTML("Hello, look at this mail");
		//$mail->AltBody = 'Hello, look at this mail';
		$mail1->AddAddress($mail, 'Kanikainathan Jerrinald');
		$mail1->addAttachment('C:\wamp64\www\service_plus_diamant\bijoux_S3\bijoux_S3\pages\Devis.pdf');
		if(!$mail1->Send()) {
			echo "Mail error: ". $mail1->ErrorInfo;
		} else {
			echo "Votre devis a été envoyée par mail, cliquez <a href='choix_produit.php'> ici pour revenir sur le site</a>;";
		}*/

		//header("Location: succes_devis.php");

	}
}
?>



