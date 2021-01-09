<?php
require('config.php');
require('../menu/menu.php');

if (isset($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['date_nai'], $_REQUEST['nom_soc'], $_REQUEST['adr_mail'], $_REQUEST['num_tel'], $_REQUEST['num_sir'], $_REQUEST['password'], $_REQUEST['mat'])){
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
              $mat = $_REQUEST['mat'];
              
              $quid = "INSERT into `users` (nom, prenom, niv_role)
              VALUES ('$nom', '$prenom', 3)";
              $resid = mysqli_query($connect, $quid);
              var_dump($resid);
              $se_id = "SELECT id_user from users where nom='$nom' and prenom='$prenom'";
              $result=mysqli_query($connect, $se_id);
              $rows = mysqli_num_rows($result);
              $row = mysqli_fetch_array($result);
              $id = $row['id_user'];
              $query = "INSERT into `professionnels` (id_pro, nom_pro, prenom_pro, date_nai_pro, nom_societe, adr_mail_pro, num_tel, num_siret, password, assigne, interet)
                VALUES ('$id', '$nom', '$prenom', '$date_nai', '$nom_soc', '$adr_mail', '$num_tel', '$num_sir', '".hash('sha256', $password)."', false, '$mat')";
                // Exécute la requête sur la base de données
              $res = mysqli_query($connect, $query);
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
    <input type="radio" name="mat" value="pierres" > Les pierres 
    <input type="radio" name="mat" value="diamants" > Les diamants 
    <br/><input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>