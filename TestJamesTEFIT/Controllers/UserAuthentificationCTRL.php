<?php
/*echo "zozo";
*/
//UserAuthentificationCTRL.php


//Recupération des données issues du formulaire par requête HTTP 
require_once '../DAO/Connexion.php';
//echo "2";
$cnx = new Connexion("127.0.0.1", "testjames", "root", "root", "mysql","3306");
//Variable $pdo avec les parametres de connexion à la base de données test
   $pdo = $cnx->getConnexion();

//echo 3(test);
$login = filter_input(INPUT_POST, "login");

$pwd = filter_input(INPUT_POST, "pwd");


$ko = 0;





/* * Utilisation d'expressions regulières et 
 * preg_match afin d'effectuer une recherche de correspondance 
 */
if (preg_match("/^[A-Za-z]{2,}$/", $login) !=1) {
    $message .= "<br>Login KO, ";
    $ko++;
} else {
    $message = "<br>Login correct, ";
}




if (preg_match("/^[a-zA-Z0-9-_.][a-zA-Z0-9-_.]{5,}/", $pwd) != 1) {
    $message .= "<br>Mot de passe KO, ";
    $ko++;
} else {
    $message = "<br>Mot de passe correct, ";
}





echo $message;