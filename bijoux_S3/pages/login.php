<?php
require_once('../menu/menu.php');

if($_SESSION[$mail]['niv_role'] == 1){
?>


<form class="box" action="session_login.php" method="post" name="login">
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
<?php  }else{ ?>
	<form class="box" action="logout.php" method="post" name="login">
		<input type="submit" value="Deconnexion " name="submit" class="box-button">
	</form>
<?php } ?>
</body>
</html>