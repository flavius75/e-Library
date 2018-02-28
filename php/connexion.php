<?php

$ini_array = parse_ini_file("config.ini");


try {

  $db_user = $ini_array['username'];
  $db_password = $ini_array['password'];
  $db_name = $ini_array['dbname'];

  $bdd = new PDO('mysql:host=localhost;dbname='.$db_name.'; charset=utf8', $db_user, $db_password);


} catch (Exception $e) {
  die('Erreur : '.$e->getMessage());
}


 ?>
