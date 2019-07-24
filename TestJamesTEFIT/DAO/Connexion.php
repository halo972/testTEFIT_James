<?php

/*
  Connexion.php
  $connexion = new PDO("mysql:host=127.0.0.1;port=3306;dbname=test;", "root", "root");
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $connexion->exec("SET NAMES 'UTF8'");
 */
//Création d'une classe Connexion ainsi que ses attributs
class Connexion {

    private $protocole;
    private $host;
    private $port;
    private $dbName;
    private $user;
    private $pwd;

    /**
     * 
     * @param string $host
     * @param string $dbName
     * @param string $user
     * @param string $pwd
     * @param string $protocole
     * @param string $port
     */
    
    //Utilisation du constructeur afin de definir les proprétés de l'objet Connexion
    public function __construct(string $host, string $dbName, string $user, string $pwd, string $protocole = "mysql", string $port = "3306") {
        $this->protocole = $protocole;
        $this->host = $host;
        $this->port = $port;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->pwd = $pwd;
    }
//Utilisation des getters et setters 
    public function getProtocole(): string {
        return $this->protocole;
    }

    public function getHost(): string {
        return $this->host;
    }

    public function getPort(): string {
        return $this->port;
    }

    public function getDbName(): string {
        return $this->dbName;
    }

    public function getUser(): string {
        return $this->user;
    }

    public function getPwd(): string {
        return $this->pwd;
    }

    public function setProtocole(string $protocole) {
        $this->protocole = $protocole;
    }

    public function setHost(string $host) {
        $this->host = $host;
    }

    public function setPort(string $port) {
        $this->port = $port;
    }

    public function setDbName(string $dbName) {
        $this->dbName = $dbName;
    }

    public function setUser(string $user) {
        $this->user = $user;
    }

    public function setPwd(string $pwd) {
        $this->pwd = $pwd;
    }

    /**
     * 
     * @return \PDO
     */
    public function getConnexion() {
        try {
            // new PDO("mysql:host=127.0.0.1;port=3306;dbname=test;", "root", "root");
            $pdo = new PDO($this->getProtocole() . ":host=" . $this->getHost() . ";port=" . $this->getPort() . ";dbname=" . $this->getDbName() . ";", $this->getUser(), $this->getPwd());
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("SET NAMES 'UTF8'");
        } catch (Exception $e) {
            return "Erreur : " . $e->getTraceAsString();
        }
        return $pdo;
    }

}

?>
