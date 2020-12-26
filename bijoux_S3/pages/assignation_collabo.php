<?php
require('../menu/menu.php');
require_once ('config.php'); ?>

<style type="text/css">
	p,
label {
    font: 2rem 'Fira Sans', sans-serif;
    margin-top: 65px;
    text-align: center;
}

input {
    margin: .2rem;
    margin-left: 580px;
}

button,
.styled {
    margin-left: 600px;
    border: 0;
    line-height: 2.5;
    padding: 0 20px;
    font-size: 1rem;
    text-align: center;
    color: #fff;
    text-shadow: 1px 1px 1px #000;
    border-radius: 10px;
    background-color: rgba(0, 0,200, 1);
    background-image: linear-gradient(to top left,
                                      rgba(0, 0, 0, .2),
                                      rgba(0, 0, 0, .2) 30%,
                                      rgba(0, 0, 0, 0));
    box-shadow: inset 2px 2px 3px rgba(255, 255, 255, .6),
                inset -2px -2px 3px rgba(0, 0, 0, .6);
}

.styled:hover {
    background-color: rgba(255, 0, 0, 1);
}

.styled:active {
    box-shadow: inset -2px -2px 3px rgba(255, 255, 255, .6),
                inset 2px 2px 3px rgba(0, 0, 0, .6);
}

.as{
  margin-top: 70px;
  text-align: center;
}
</style>

<?php 
if(isset($_POST['submit'])){
  $query = "UPDATE `professionnels` SET assigne=1 WHERE id_pro= " . $_GET["id"];
  $result = mysqli_query($connect, $query);

  $assign = "INSERT into `assignation` (id_pro, id_collabo)
              VALUES (" . $_GET['id'] ."," . $_REQUEST['col'] .")";
  $res = mysqli_query($connect, $assign);

    if($result and $res){
      echo "<p>Assignation réalisé avec succès. <a href='liste_a_assigner.php'>Cliquez ici pour revenir à la liste</a></p>";
    }else{
      echo "Echec";
    }
}else{

  if(isset($_GET["id"]) and preg_match("/^\d+$/", $_GET["id"])){
    $query = "SELECT * FROM professionnels where id_pro=". $_GET["id"];
    $result = mysqli_query($connect, $query); ?>

   <div class="as">
    <?php while($row = mysqli_fetch_array($result)){
      echo "<p>Monsieur " . $row['nom_pro'] . " vient de s'inscrire. Il semblerait qu'il soit plus interessé par les " . $row['interet'] . "</p><br/>";
    }
  }
  ?>
  </div>
  <p>A qui voulez-vous l'assignez ?</p><br/><br/>

  <form action="?id=<?php echo $_GET["id"]; ?>" method="post">
    <div>
    <input type="checkbox" name="col" value="2"> Collaborateur A
    </div>
    <div>
    <input type="checkbox" name="col" value="3"> Collaborateur B
    </div>
    <br/>
    <div>
    <input type="submit" name="submit" value="Confirmer" class="favorite styled" />
    </div>
  </form>
<?php } ?>
