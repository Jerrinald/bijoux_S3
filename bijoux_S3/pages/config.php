<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'bdd_bijoux');
 
// Connexion à la base de données MySQL 
$connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


// Vérifier la connexion
if($connect === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>