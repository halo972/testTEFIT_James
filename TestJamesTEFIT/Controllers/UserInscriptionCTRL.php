
<?php

//UserInscriptionCTRL.php
require_once '../DAO/UserDAO.php';
require_once '../DAO/Connexion.php';
require_once '../Model/User.php';

//Recupération des données issues du formulaire
$firstname = filter_input(INPUT_POST, "firstname");
$lastname = filter_input(INPUT_POST, "lastname");
$pwd = filter_input(INPUT_POST, "pwd");
$email = filter_input(INPUT_POST, "email");
$birthday = filter_input(INPUT_POST, "birthday");
$sexe = filter_input(INPUT_POST, "sexe");

//On initialise la variable $ko à 0
$ko = 0;

//Allocation de la variable message à ensemble vide
$message = "";

//Utilisation des expressions régulières pour tester/Utilisation de preg_match pour effectuer une recherche de correspondance
if (preg_match("/^[A-Za-z]{2,}$/", $firstname) == 0) {
    $message .= "<br>firstname KO, ";
    $ko++;
}

if (preg_match("/^[A-Za-z]{2,}$/", $lastname) == 0) {
    $message .= "<br>lastname KO, ";
    $ko++;
}
if (preg_match("/^[a-zA-Z0-9-_.][a-zA-Z0-9-_.]{5,}/", $pwd) ==0) {
    $message .= "<br>Mot de passe KO, ";
    $ko++;
}

if (preg_match("/^[0-9a-z_-]+([.][0-9a-z_-]+)?@[0-9a-z._-]{2,}[.][a-z]{2,5}$/i", $email) == 0) {
    $message .= "<br>E-mail KO, ";
    $ko++;
}
if (preg_match("@^[0-9]/[0-9]/[0-9]$@", $birthday) == 0) {
    $message .= "<br>Date de naissance KO, ";
    $ko++;
}


if (preg_match("/^[1-2]$/", $sexe) == 0) {
    $message .= "<br>Sexe KO, ";
    $ko++;
}
//try catch afin de gerer les erreurs
try {
        /*
         * Connexion
         */
        $lcnx = new PDO("mysql:host=localhost;port=3306;dbname=test;", "root", "root");
        $lcnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $lcnx->exec("SET NAMES 'UTF8'");

     //Instanciation d'un nouvel utilisateur correspondant aux colonnes de ma base de données 
        $user = new User($firstname, $lastname, $email, $birthday, $pwd, $sexe);
    
        $dao = new UserDAO();
                        
    
        $dao->insert($lcnx, $user);

       
        
        $lsMessage = "OK";
    } catch (PDOException $e) {

        //Message renvoyé à UserIHM s'il manque une saisie
        $lsMessage ="Toutes les saisies sont obligatoires"  ;
    }


include '../View/UserIHM.php';
