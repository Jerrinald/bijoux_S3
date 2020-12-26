<?php
require_once('config.php');
session_start(); 


if ((isset($_POST['mail']) and $_POST['password'])){
	$mail = stripslashes($_REQUEST['mail']);
	$mail = mysqli_real_escape_string($connect, $mail);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($connect, $password);
  $query1 = "SELECT * FROM `professionnels` WHERE adr_mail_pro='$mail' and password='".hash('sha256', $password)."'";
  $query2 = "SELECT * FROM `particuliers` WHERE adr_mail_part='$mail' and password='".hash('sha256', $password)."'";
  $query3 = "SELECT * FROM `administrateurs` WHERE adr_mail_admin='$mail' and password='".hash('sha256', $password)."'";

	$result1 = mysqli_query($connect,$query1) or die(mysql_error());
  $result2 = mysqli_query($connect,$query2) or die(mysql_error());
  $result3 = mysqli_query($connect,$query3) or die(mysql_error());
  $result4 = mysqli_query($connect,$query4) or die(mysql_error());

	$rows1 = mysqli_num_rows($result1);
  $rows2 = mysqli_num_rows($result2);
  $rows3 = mysqli_num_rows($result3);
  $rows4 = mysqli_num_rows($result4);

	if($rows1==1 or $rows2==1 or $rows3==1 or $rows4==1){
		//unset($_SESSION[$compte]);
		$niv_pro = "SELECT niv_role FROM `users` INNER JOIN `professionnels` on `users`.id_user = `professionnels`.id_pro WHERE adr_mail_pro='$mail'";
		$niv_part = "SELECT niv_role FROM `users` INNER JOIN `particuliers` on `users`.id_user = `particuliers`.id_part WHERE adr_mail_pro='$mail'";
		$niv_admin = "SELECT niv_role FROM `users` INNER JOIN `administrateurs` on `users`.id_user = `administrateurs`.id_admin WHERE adr_mail_admin='$mail'";
		$niv_collabo = "SELECT niv_role FROM `users` INNER JOIN `collaborateurs` on `users`.id_user = `collaborateurs`.id_colabo WHERE adr_mail_collabo='$mail'";


		$res_pro = mysqli_query($connect,$niv_pro);
		$res_part = mysqli_query($connect,$niv_part);
		$res_admin = mysqli_query($connect,$niv_admin);
		$res_collabo = mysqli_query($connect,$niv_collabo);

		if($res_pro){
			$row_pro = mysqli_fetch_array($res_pro);
		    $que_pro = $row_pro['niv_role'];
		    $_SESSION['mail'] = $mail; 
		    $_SESSION['niv_role'] = $que_pro;
		}elseif ($res_part) {
			$row_part = mysqli_fetch_array($res_part);
		    $que_part = $row_part['niv_role'];
		    $_SESSION['mail'] = $mail;
		    $_SESSION['niv_role'] = $que_part;
		}elseif ($res_admin) {
			$row_admin = mysqli_fetch_array($res_admin);
		    $que_admin = $row_admin['niv_role'];
		    $_SESSION['mail'] = $mail;
		    $_SESSION['niv_role']= $que_admin;
		}
		elseif ($res_collabo) {
			$row_collabo = mysqli_fetch_array($res_collabo);
		    $que_collabo = $row_collabo['niv_role'];
		    $_SESSION['mail'] = $mail;
		    $_SESSION['niv_role']= $que_collabo;
		}
	    header("Location: index.php");

	}else{
		//$message = "Le mail ou le mot de passe est incorrect.";
		header("Location: login.php");
	}
}

/*if($compte == 'visiteur'){
	$_SESSION[$compte]['niv_role'] =1;
}
else{
	unset($_SESSION['visiteur']);
	$_SESSION[$compte]['niv_role'] = $_SESSION[$compte]['niv_role'];
}*/
/*if (!isset($_SESSION[$compte]['shopping_cart'])){
    $_SESSION[$compte]['compteur']=0;
  }*/




 ?>

