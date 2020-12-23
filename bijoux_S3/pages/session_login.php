<?php
require_once('config.php');
session_start(); 


$compte = 'visiteur';
if(!isset($_SESSION[$compte])){
	$_SESSION[$compte]['niv_role'] =1;
}

if ((isset($_POST['mail']) and $_POST['password'])){
	$mail = stripslashes($_REQUEST['mail']);
	$mail = mysqli_real_escape_string($connect, $mail);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($connect, $password);
  $query1 = "SELECT * FROM `professionnels` WHERE adr_mail_pro='$mail' and password='".hash('sha256', $password)."'";
  $query2 = "SELECT * FROM `particuliers` WHERE adr_mail_part='$mail' and password='".hash('sha256', $password)."'";

	$result1 = mysqli_query($connect,$query1) or die(mysql_error());
  $result2 = mysqli_query($connect,$query2) or die(mysql_error());

	$rows1 = mysqli_num_rows($result1);
  $rows2 = mysqli_num_rows($result2);

	if($rows1==1 or $rows2==1){
		$niv_pro = "SELECT niv_role FROM `users` INNER JOIN `professionnels` on `users`.id_user = `professionnels`.id_pro WHERE adr_mail_pro='$mail'";
		$niv_part = "SELECT niv_role FROM `users` INNER JOIN `particuliers` on `users`.id_user = `particuliers`.id_part WHERE adr_mail_pro='$mail'";
		$niv_admin = "SELECT niv_role FROM `users` INNER JOIN `administrateurs` on `users`.id_user = `administrateurs`.id_admin WHERE adr_mail_admin='$mail'";


		$res_pro = mysqli_query($connect,$niv_pro);
		$res_part = mysqli_query($connect,$niv_part);
		$res_admin = mysqli_query($connect,$niv_admin);

		if($res_pro){
			$row_pro = mysqli_fetch_array($res_pro);
		    $que_pro = $row_pro['niv_role'];
		    $compte = $mail;
		    $_SESSION[$compte]['niv_role'] = $que_pro;
		}elseif ($res_part) {
			$row_part = mysqli_fetch_array($res_part);
		    $que_part = $row_part['niv_role'];
		    $compte = $mail;
		    $_SESSION[$compte]['niv_role'] = $que_part;
		}elseif ($res_admin) {
			$row_admin = mysqli_fetch_array($res_admin);
		    $que_admin = $row_admin['niv_role'];
		    $compte = $mail;
		    $_SESSION[$compte]['niv_role'] = $que_admin;
		}
	    var_dump($_SESSION);
	    //header("Location: index.php");

	}else{
		//$message = "Le mail ou le mot de passe est incorrect.";
		header("Location: login.php");
	}
}
 ?>

