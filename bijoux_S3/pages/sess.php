<?php
require_once('config.php');
session_start(); 


if ((isset($_POST['mail']) and $_POST['password'])){
	var_dump($_POST['password']);
}
?>