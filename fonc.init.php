<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
  
   <!--><IfInclude ServerRoot "/presdechezvous">
   <Directory "/http://presdechezvous.livehost.fr/presdechezvous/inscription.html">
  
  
   </Directory>
 
  
 </IfInclude> <-->
		<title>Fonction du projet PresDeChezVous </title>	
	</head>
	<script>
		
	
	
	</script>
  
  <body>

 
 <script>
 function TelEmail($mail, $tel){
    if(Isset($mail, $tel)){
        alert("Veuillez indiquer votre num&eacute;ro de t&eacute;l&eacute;phone ou votre adresse mail");
    } 
}
  
 </script>
 
 <?php

// Sources www.stackoverflow.com


function encrypt($pure_string, $encryption_key) {

    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);

    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);

    return $encrypted_string;

}


function decrypt($encrypted_string, $encryption_key) {

    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);

    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);

    return $decrypted_string;

}

/* exemple de fonctionnement de ces fonctions : 
*
*$messageAChiffrer = "Coucou je suis Guillaume";
*$cleSecrete = "MaCleEstIncassable";
*
*
*	On chiffre le message
*$messageChiffre = encrypt($messageAChiffrer, $cleSecrete);
*
*	Pour le lire
*$messageDechiffrer = decrypt($messageChiffre, $cleSecrete);
* 
*	Il faut en plus hasher le mot de passe donc on va utiliser la fonction
* password_hash($messageChiffre);
* password_verify — Vérifie qu'un mot de passe correspond à un hachage
* 
*	Il faut ensuite rajouter un "salt" dynamique afin que tout les mots de passe ne puissent pas être décryptés
* si le pirate trouve la clé du hashage. Pour cela, on utilise le fichier .htacces
*  
* 
* Il faut utiliser  password_verify() pour comparer les mots de passe sur le temps au lieu de = et ==
* 
* Liste des utilisations de hachage : http://php.net/manual/fr/book.password.php
* 
* 
*/
?>
 
$var = ServerRoot "/home/httpd";

</body>