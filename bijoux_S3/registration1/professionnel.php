<!DOCTYPE html>
<html>
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
if (isset($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['date_nai'], $_REQUEST['nom_soc'], $_REQUEST['adr_mail'], $_REQUEST['num_tel'], $_REQUEST['num_sir'], $_REQUEST['password'])){
  if(preg_match("/^[a-zA-Z]+$/", $_REQUEST['nom'])){
    $nom = $_REQUEST['nom'];
    if(preg_match("/^[a-zA-Z]+$/", $_REQUEST['prenom'])){
      $prenom = $_REQUEST['prenom'];
      if(preg_match("/^([0-9]{4})(-[0-9]{2}){2}$/", $_REQUEST['date_nai'])){
        $date_nai = $_REQUEST['date_nai'];
        if(preg_match("/^((\d){3} ){3}\d{5}$/", $_REQUEST['num_sir'])){
          $num_sir = $_REQUEST['num_sir'];
          if(preg_match("/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/", $_REQUEST['adr_mail'])){
            $adr_mail = $_REQUEST['adr_mail'];
            if(preg_match("/^0[1-68]([-. ]?[0-9]{2}){4}$/", $_REQUEST['num_tel'])){
              echo "message";
              $num_tel = $_REQUEST['num_tel'];
              $nom_soc = $_REQUEST['nom_soc'];
              $password = $_REQUEST['password'];
              
              $quid = "INSERT into `users` (nom, prenom, niv_role)
              VALUES ('$nom', '$prenom', 2)";
              $resid = mysqli_query($conn, $quid);
              var_dump($resid);
              $se_id = "SELECT id_user from users where nom='$nom' and prenom='$prenom'";
              $result=mysqli_query($conn, $se_id);
              var_dump($result);
              
              $rows = mysqli_num_rows($result);
              $row = mysqli_fetch_array($result);
              $id = $row['id_user'];
              $query = "INSERT into `professionnels` (id_pro, nom_pro, prenom_pro, date_nai_pro, nom_societe, adr_mail_pro, num_tel, num_siret, password)
                VALUES ('$id', '$nom', '$prenom', '$date_nai', '$nom_soc', '$adr_mail', '$num_tel', '$num_sir', '".hash('sha256', $password)."')";
                // Exécute la requête sur la base de données
              $res = mysqli_query($conn, $query);
              if($res){
                 echo "<div class='sucess'>
                       <h3>Vous êtes inscrit avec succès.</h3>
                       <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
                 </div>";
              }
            }else{ echo "<p> Numéro incorrect ou vide</p>"; }
          }else{ echo "<p> Mail incorrect ou vide</p>"; }
        }else{ echo "<p> Siret incorrect ou vide</p>"; }
      }else{ echo "<p> Date naissance incorrect ou vide</p>"; }
    }else{ echo "<p> Prénom incorrect ou vide</p>"; }
  }else{ echo "<p> Nom incorrect ou vide</p>"; }

}else{
?>

<form class="box" action="" method="post">
	<h1 class="box-logo box-title"><a href="">S'inscrire</a></h1>
    <h1 class="box-title">Professionnel</h1>
    <label>Veuillez saisir votre nom :</label>
	<input type="text" class="box-input" name="nom" placeholder="Exemple : Dupond" required />
  <label>Veuillez saisir votre prenom :</label>
    <input type="text" class="box-input" name="prenom" placeholder="Exemple : Gerard" required />
    <label>Veuillez saisir votre date de naissance :</label>
    <input type="date" class="box-input" name="date_nai" placeholder="Date de naissance" required />
    <label>Veuillez saisir le nom de votre société :</label>
    <input type="text" class="box-input" name="nom_soc" placeholder="Exemple : Darty" required />
    <label>Veuillez saisir votre mail profssionnel :</label>
    <input type="text" class="box-input" name="adr_mail" placeholder="Exemple : nomfamille@nom_societe.com" required />
    <label>Veuillez saisir votre numéro de téléphone :</label>
    <input type="text" class="box-input" name="num_tel" placeholder="Exemple : 0657458514" required />
    <label>Veuillez saisir le numéro Siret de votre société :</label>
    <input type="text" class="box-input" name="num_sir" placeholder="Exemple : 808 379 499 00011" required />
    <label>Veuillez saisir votre mot de passe :</label>
    <input type="password" class="box-input" name="password" placeholder="Exemple : titi01" required />
    <label>Plus interessé par: (juste à titre informatif)</label>
    <div>
      <input type="radio" id="contactChoice1"
       name="contact" value="email">
      <label for="contactChoice1">Les pierres</label>
      <input type="radio" id="contactChoice2"
       name="contact" value="telephone">
      <label for="contactChoice2">Les diamants</label>
    </div>
    <br/><input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>