<?php

//UserDAO.php
class UserDAO {

    public function selectOne(PDO $pdo, string $login, string $mdp): Utilisateurs {

        try {
            $cursor = $pdo->prepare("SELECT * FROM users WHERE login = ? AND pwd = ?");
            $cursor->bindParam(1, $login);
            $cursor->bindParam(2, $pwd);
            $cursor->execute();
            $record = $cursor->fetch();
            if ($record != false) {
                $object = new Utilisateurs($record[$login], $record[$pwd]);
            } else {
                $object = new Utilisateurs("Introuvable", "", "", "");
            }
            $cursor->closeCursor();
        } catch (Exception $e) {
            $object = new Utilisateurs("Erreur", $e->getMessage());
        }

        return $object;
    }

    function insert(PDO $pdo, Users $object): int {

        $i = 0;

        try {
            $cmd = $pdo->prepare("INSERT INTO users(firstname, lastname, email, pwd, birthday ,sexe) VALUES(?,?,?,?,?,?)");
            $cmd->bindValue(1, $object->getFirstname());
            $cmd->bindValue(2, $object->getLastname());
            $cmd->bindValue(3, $object->getEmail());
            $cmd->bindValue(4, $object->getPwd());
            $cmd->bindValue(5, $object->getBirthday());
            $cmd->bindValue(5, $object->getSexe());
            
            
            $cmd->execute();
            $i = 1;
        } catch (Exception $e) {
            $i = -1;
            //echo $e->getMessage();
        }

        return $i;
    }

}
