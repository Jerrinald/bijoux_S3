<?php

require('config.php');
require('../menu/menu.php');

//si les champs suivants sont transmis
if (isset($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['date_nai'], $_REQUEST['adr_mail'], $_REQUEST['num_tel'], $_REQUEST['password'])){
  //on recupere les valeus passsés dans des variables si les vaiables sont correctes
 if(preg_match("/^[a-zA-Z]+$/", $_REQUEST['nom'])){
    $nom = $_REQUEST['nom'];
    if(preg_match("/^[a-zA-Z]+$/", $_REQUEST['prenom'])){
      $prenom = $_REQUEST['prenom'];
      if(preg_match("/^([0-9]{4})(-[0-9]{2}){2}$/", $_REQUEST['date_nai'])){
        $date_nai = $_REQUEST['date_nai'];
        if(preg_match("/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/", $_REQUEST['adr_mail'])){
          $adr_mail = $_REQUEST['adr_mail'];
          if(preg_match("/^0[1-8]([-. ]?[0-9]{2}){4}$/", $_REQUEST['num_tel'])){
            $num_tel = $_REQUEST['num_tel'];
            $password = $_REQUEST['password'];

            //insertion dans la table users des champs nom, prenom et le niveau de role
            $quid = "INSERT into `users` (nom, prenom, niv_role)
              VALUES ('$nom', '$prenom', 2)";
            $resid = mysqli_query($connect, $quid);

            //recuperer l'id du user qui vient d'être insérer dans la table user
            $se_id = "SELECT id_user from users where nom='$nom' and prenom='$prenom'";
            $result=mysqli_query($connect, $se_id);
            
            $rows = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            $id = $row['id_user'];

            //inserer les valeurs transmises dans la table particuliers dont l'id qui vient d'être récupérer
            $query = "INSERT into `particuliers` (id_part, nom_part, prenom_part, date_nai_part, adr_mail_part, num_tel, password)
              VALUES ('$id', '$nom', '$prenom', '$date_nai', '$adr_mail', '$num_tel', '".hash('sha256', $password)."')";
              // Exécute la requête 
            $res = mysqli_query($connect, $query);
            //si la requete a fonctionner on affiche le succes
            if($res){
               echo "<div class='sucess'>
                     <h3>Vous êtes inscrit avec succès.</h3>
                     <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
               </div>";
            }//sinon on affiche quel est l'erreur qui a été faîtes
          }else{ echo "<p> Numéro incorrect ou vide</p>"; }
        }else{ echo "<p> Mail incorrect ou vide</p>"; }
      }else{ echo "<p> Date naissance incorrect ou vide</p>"; }
    }else{ echo "<p> Prénom incorrect ou vide</p>"; }
  }else{ echo "<p> Nom incorrect ou vide</p>"; }

}else{
?>

<!----formulaire du professionnel ----->
<form class="box" action="" method="post">
	<h1 class="box-logo box-title"><a href="../index.php">S'inscrire</a></h1>
    <h1 class="box-title">Particulier</h1>
	<label>Veuillez saisir votre nom :</label>
  <input type="text" class="box-input" name="nom" placeholder="Exemple : Dupond" required />
  <label>Veuillez saisir votre prenom :</label>
    <input type="text" class="box-input" name="prenom" placeholder="Exemple : Gerard" required />
    <label>Veuillez saisir votre date de naissance :</label>
    <input type="date" class="box-input" name="date_nai" placeholder="Date de naissance" required />
    <label>Veuillez saisir votre adresse mail :</label>
    <input type="text" class="box-input" name="adr_mail" placeholder="Exemple : dupond@gmail.com" required />
    <label>Veuillez saisir votre numéro de téléphone :</label>
    <input type="text" class="box-input" name="num_tel" placeholder="Exemple : 0657458514" required />
    <label>Veuillez saisir votre mot de passe :</label>
    <input type="password" class="box-input" name="password" placeholder="Exemple : titi01" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>