<?php
// Parametres mysql à remplacer par les vôtres
define('DB_SERVER', 'localhost'); // serveur mysql
define('DB_SERVER_USERNAME', 'presdevous_9ss5'); // nom d'utilisateur
define('DB_SERVER_PASSWORD', 'presdechezvous2017'); // mot de passe
define('DB_DATABASE', 'presdevous_9ss5'); // nom de la base
 
// Connexion au serveur mysql
$connect = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, 
DB_SERVER_PASSWORD) 
or die('Impossible de se connecter : ' . mysql_error());
// sélection de la base de données
mysql_select_db(DB_DATABASE, $connect);
 
$msg_erreur = "Erreur. Les champs suivants doivent être obligatoirement remplis :<br/><br/>";
$msg_ok = "Votre demande a bien été prise en compte.";
$message = $msg_erreur;
 
//Afaire : verif adresse mail+tel si correct si pass et pass2 correpondent
// Def ce qui obligatoire ou non
//adress visible
//ville a ajouter et aussi sur mysql
//image
 
// sinon c'est ok 
//remttre focntion vaerif mdp
 
  foreach($_POST as $index => $valeur) {
    $$index = mysql_real_escape_string(trim($valeur));
  }
 
 
 $sql = "DELETE FROM `_producteur` WHERE `login` = '".$pseudo."' AND `mdp`='".$pass."'" ;
 
  $res = mysql_query($sql);
 
  if ($res) {
    echo $msg_ok;
  } else {
    echo mysql_error();
  }
 
?>


