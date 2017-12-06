<?php
/* Connexion à une base ODBC avec l'invocation de pilote */
$dsn = 'mysql:dbname=presdevous_9ss5;host=localhost';
$user = 'presdevous_9ss5';
$password = 'presdechezvous2017';

try {
    $bdd = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

$stmt = $bdd->prepare("UPDATE `_producteur` SET `nom`= name WHERE `login`='bgdu35'");
$stmt->bindParam(':name', $name);

$name=$nom;
$stmt->execute();

//while ($donnees = $reponse->fetch()){ // pour afficher la table
	//echo $donnees['nb'];
//}

?>
