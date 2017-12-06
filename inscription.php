
<?php
    # la clé devrait être un binaire aléatoire, utilisez la fonction scrypt, bcrypt
    # ou PBKDF2 pour convertir une chaîne de caractères en une clé.
    # La clé est spécifiée en utilisant une notation héxadécimale.
    $key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    
    # Montre la taille de la clé utilisée ; soit des clés sur 16, 24 ou 32 octets pour
    # AES-128, 192 et 256 respectivement.
    $key_size =  strlen($key);

    
    # Crée un IV aléatoire à utiliser avec l'encodage CBC
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    
    # Crée un texte cipher compatible avec AES (Rijndael block size = 128)
    # pour conserver le texte confidentiel.
    # Uniquement applicable pour les entrées encodées qui ne se terminent jamais
    # pas la valeur 00h (en raison de la suppression par défaut des zéros finaux)
    

    # On ajoute le IV au début du texte chiffré pour le rendre disponible pour le déchiffrement
    
    
    
function Encryp($plaintext, $key, $key_size, $iv_size, $iv){

    
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
                                 $plaintext, MCRYPT_MODE_CBC, $iv);    
    $ciphertext = $iv . $ciphertext;
    # Encode le texte chiffré résultant pour qu'il puisse être représenté par une chaîne de caractères
    $ciphertext_base64 = base64_encode($ciphertext);

    return  $ciphertext_base64;
}

function Decryp($plaintext, $key, $iv){
    # Montre la taille de la clé utilisée ; soit des clés sur 16, 24 ou 32 octets pour
    # AES-128, 192 et 256 respectivement.
    $key_size =  strlen($key);
     $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
                                 $plaintext, MCRYPT_MODE_CBC, $iv);
    $ciphertext_dec = base64_decode($plaintext);
    
    # Récupère le IV, iv_size doit avoir été créé en utilisant la fonction
    # mcrypt_get_iv_size()
    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
    
    # Récupère le texte du cipher (tout, sauf $iv_size du début)
    $ciphertext_dec = substr($ciphertext_dec, $iv_size);

    # On doit supprimer les caractères de valeur 00h de la fin du texte plein
    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
                                    $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
    
    echo  $plaintext_dec . "\n";
}
    

$messagechiffre= Encryp($_POST['pass'], $key, $key_size, $iv_size, $iv);
Decryp($messagechiffre, $key, $iv);

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
 
// vérification des champs 
if (empty($_POST['pseudo'])) 
  $message .= "pseudo<br/>";
if (empty($_POST['pass'])) 
  $message .= "Votre pass<br/>";

if (empty($_POST['email'])) 
  $message .= "email<br/>";
if (empty($_POST['tel'])) 
  $message .= "Votre tel<br/>";
if (empty($_POST['adresse'])) 
  $message .= "adresse<br/>";
if (empty($_POST['code'])) 
  $message .= "Votre code postal<br/>";
if (empty($_POST['description'])) 
  $message .= "Votre description<br/>";
if (empty($_POST['nom'])) 
  $message .= "Votre nom<br/>";
if (empty($_POST['prenom'])) 
  $message .= "Votre prenom<br/>";







//A faire : verif adresse mail+tel si correct si pass et pass2 correpondent
// Def ce qui obligatoire ou non
//adress visible
//image



 
// si un champ est vide, on affiche le message d'erreur 
if (strlen($message) > strlen($msg_erreur)) {
 
  echo $message;
 
// sinon c'est ok 
} else {
 
  foreach($_POST as $index => $valeur) {
    if($index == $_POST['pass']){
      $$index = mysql_real_escape_string(trim($messagechiffre));
    }
    else{
      $$index = mysql_real_escape_string(trim($valeur));
    }
  }
 
 
  $sql = "INSERT INTO `_producteur`(`login`,`nom`,`prenom`,`mdp`,`adr`,`code`,`tel`,`mail`,`photo`,`presentation`) VALUES ('".$pseudo."','".$nom."','".$prenom."','".$messagechiffre."','".$adresse."','".$code."','".$tel."','".$email."','".$photo."','".$description."')";
  $res = mysql_query($sql);
 
  if ($res) {
    echo $msg_ok;
  } else {
    echo mysql_error();
  }
 
}
?>


