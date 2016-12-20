<?php

/**
 * Created by PhpStorm.
 * User: EL MARSSI Tarek
 * Date: 07/12/2016
 * Time: 09:59
 */
class UserDAO
{
    private $dbh;
    private $selectAll;
    private $selectByID;
    private $selectByPseudo;
    private $update;
    private $insertUser;
    private $loginQuery;

    /**
     * UserDAO constructor.
     */
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
        $this->selectAll = $this->dbh->prepare("SELECT * FROM User");
        $this->insertUser = $this->dbh->prepare("INSERT INTO user(NOM, PRENOM, SEXE, DATE_NAISSANCE, PASSWORD, EMAIL, ID_VILLE) 
                                               VALUES (?,?,?,?,?,?,?)");

        $this->selectByID = $this->dbh->prepare("SELECT * FROM User WHERE USER.ID_USER=?");
        $this->selectByPseudo = $this->dbh->prepare("SELECT * FROM User WHERE USER.NOM=?");
        $this->update = $this->dbh->prepare("UPDATE FROM User SET
                                          nom=?,prenom=?,sexe=?,
                                           date_naissance=?,password=?
                                           WHERE ID_USER=?");

        $this->loginQuery = $this->dbh->prepare("SELECT * FROM User
                                         WHERE pseudo=?");


    }


    public function login($userName)
    {
        $user = $this->loginQuery->execute([$userName]);

        return $this->loginQuery->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getDbh()
    {
        var_dump($this->dbh);
    }

    public function selectAll()
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByID($userID)
    {
        $this->selectByID->execute([$userID]);
        return $this->selectByID->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByPseudo($pseudo)
    {
        $this->selectByPseudo->execute([$pseudo]);
        return $this->selectByPseudo->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertUser($user)
    {
        $nom = $user->getNom();
        $prenom = $user->getPrenom();
        $sexe = $user->getSexe();
        $dateNaissance = $user->getDateNaissance();
        $password = UserDAO::hashPassword($user->getPassword());
        $idVille = $user->getIdVille();
        $email = $user->getEmail();
        $insertCount = $this->insertUser->execute([$nom, $prenom, $sexe, $dateNaissance, $password, $email, $idVille]);

        return $insertCount;
    }

    //Fonction de cryptage du mot de passe
    public static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);

    }


}