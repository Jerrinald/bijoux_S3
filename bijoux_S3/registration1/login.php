<!DOCTYPE html>
<html>
<html lang="en">
<head>
	<link rel="stylesheet" href="style1.css" />
	<link rel="stylesheet" href="../styles.css" />

</head>
<body>

<header id="header" class="header">
    <div class="navigation">
      <div class="container">
        <nav class="nav">
          <div class="nav__hamburger">
            <svg>
              <use xlink:href="../images/sprite.svg#icon-menu"></use>
            </svg>
          </div>

          <div class="nav__logo">
            <a href="../index.php" class="scroll-link">
              DIAMANT
            </a>
          </div>

          <div class="nav__menu">
            <div class="menu__top">
              <span class="nav__category">DIAMANT</span>
              <a href="#" class="close__toggle">
                <svg>
                  <use xlink:href="../images/sprite.svg#icon-cross"></use>
                </svg>
              </a>
            </div>
            <ul class="nav__list">
              <li class="nav__item">
                <a href="#header" class="nav__link scroll-link">Acceuil</a>
              </li>
              <li class="nav__item">
                <a href="#category" class="nav__link scroll-link">Categorie</a>
              </li>
              <li class="nav__item">
                <a href="#news" class="nav__link scroll-link">Blog</a>
              </li>
              <li class="nav__item">
                <a href="#contact" class="nav__link scroll-link">Contact</a>
              </li>
            </ul>
          </div>

          <div class="nav__icons">
            <a href="login.php" class="icon__item">
              <svg class="icon__user">
                <use xlink:href="../images/sprite.svg#icon-user"></use>
              </svg>
            </a>

            <a href="#" class="icon__item">
              <svg class="icon__search">
                <use xlink:href="../images/sprite.svg#icon-search"></use>
              </svg>
            </a>

            <a href="#" class="icon__item">
              <svg class="icon__cart">
                <use xlink:href="../images/sprite.svg#icon-shopping-basket"></use>
              </svg>
              <span id="cart__total">0</span>
            </a>
          </div>
        </nav>
      </div>
    </div>
   </header>

<?php
require('config.php');
session_start();


if ((isset($_POST['mail']) and $_POST['password'])){
	$mail = stripslashes($_REQUEST['mail']);
	$mail = mysqli_real_escape_string($conn, $mail);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
  $query1 = "SELECT * FROM `professionnels` WHERE adr_mail_pro='$mail' and password='".hash('sha256', $password)."'";
  $query2 = "SELECT * FROM `particuliers` WHERE adr_mail_part='$mail' and password='".hash('sha256', $password)."'";

	$result1 = mysqli_query($conn,$query1) or die(mysql_error());
  $result2 = mysqli_query($conn,$query2) or die(mysql_error());

	$rows1 = mysqli_num_rows($result1);
  $rows2 = mysqli_num_rows($result2);

	if($rows1==1 or $rows2==1){
	    $_SESSION['mail'] = $mail;
	    header("Location: ../index.php");
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
