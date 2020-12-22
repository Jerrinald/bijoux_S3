<?php
require('config.php');
require('../menu/menu.php');

session_start();


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
	    $_SESSION['mail'] = $mail;
	    header("Location: index.php");
	}else{
		$message = "Le mail ou le mot de passe est incorrect.";
	}
}
session_destroy();
?>

<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title"><a href="">Connexion</a></h1>
<h1 class="box-title"></h1>
<input type="text" class="box-input" name="mail" placeholder="Adresse mail">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="inscription.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>