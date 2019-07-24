<?php

//User.php

//Je crée une classe User qui sera l'équivalent de ma table Users
class User {
    //J'instancie les attributs de ma classe qui sont les équivalents des colonnes de ma table Users
    private $firstname;
    private $lastname;
    private $email;
    private $pwd;
    private $birthday;
    private $sexe;
    //J'utilise la fonction constructeur
    function __construct($firstname="", $lastname="", $email="", $pwd="", $birthday="", $sexe="") {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->birthday = $birthday;
        $this->sexe = $sexe;
    }
    //Utilisation des getters et setters
    function getFirstname() {
        return $this->firstname;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getEmail() {
        return $this->email;
    }

    function getPwd() {
        return $this->pwd;
    }

    function getBirthday() {
        return $this->birthday;
    }

    function getSexe() {
        return $this->sexe;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPwd($pwd) {
        $this->pwd = $pwd;
    }

    function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    function setSexe($sexe) {
        $this->sexe = $sexe;
    }
}