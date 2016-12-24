<?php

/**
 * Created by PhpStorm.
 * User: EL MARSSI Tarek
 * Date: 07/12/2016
 * Time: 09:59
 */
class UserDAO
{
    static $SELECT_ALL = "SELECT * FROM user";
    static $INSERT = "INSERT INTO user(NOM, PRENOM, SEXE, DATE_NAISSANCE, PASSWORD, EMAIL, ID_VILLE) VALUES (?,?,?,?,?,?,?)";
    static $SELECT_BY_ID = "SELECT * FROM user WHERE user.ID_USER=?";
    static $SELECT_BY_EMAIL = "SELECT * FROM user WHERE user.EMAIL=?";

    private $db;
    private $queries = [
        'selectAll' => "",
        'selectById' => "",
        'selectByEmail' => "",
        'insert' => ""
    ];

    /**
     * UserDAO constructor.
     */
    public function __construct($db)
    {
        $this->db = $db;

        $this->queries['selectAll'] = $this->db->prepare(UserDAO::$SELECT_ALL);
        $this->queries['selectById'] = $this->db->prepare(UserDAO::$SELECT_BY_ID);
        $this->queries['selectByEmail'] = $this->db->prepare(UserDAO::$SELECT_BY_EMAIL);
        $this->queries['insert'] = $this->db->prepare(UserDAO::$INSERT);
    }

    /**
     * Functions DAO
     */

    public function selectAll()
    {
        $this->queries['selectAll']->execute();
        return $this->queries['selectAll']->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByID($userID)
    {
        $this->queries['selectById']->execute([$userID]);
        return $this->queries['selectById']->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByEmail($email)
    {
        $this->queries['selectByEmail']->execute([$email]);
        return $this->queries['selectByEmail']->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertUser(User $user)
    {
        $nom = $user->getNom();
        $prenom = $user->getPrenom();
        $sexe = $user->getSexe();
        $dateNaissance = $user->getDateNaissance();
        $password = UserDAO::hashPassword($user->getPassword());
        $idVille = $user->getIdVille();
        $email = $user->getEmail();

        $insertCount = $this->queries['insert']->execute([$nom, $prenom, $sexe, $dateNaissance, $password, $email, $idVille]);

        return $insertCount;
    }

    public function logIn($email, $password)
    {
        $user = new User($this->selectByEmail($email)[0]);

        if ($user) {
            if (password_verify($password, $user->getPassword())) {
                return $user;
            }
        }
        return false;
    }


    /**
     * Other functions
     */

    public static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }


}