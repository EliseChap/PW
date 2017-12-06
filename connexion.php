<?php
/* Connexion à une base ODBC avec l'invocation de pilote */
$dsn = 'mysql:dbname=presdevous_9ss5;host=www.livehost.fr';
$user = 'presdevous_9ss5';
$password = 'presdechezvous2017';

try {
    $bdd = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
$reponse = $bdd->query('SELECT * FROM `_personne`');

/while ($donnees = $reponse->fetch()){ // pour afficher la table
	echo $donnees['nom'];
//}

?>