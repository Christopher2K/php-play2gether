<?php

/**
 * Created by PhpStorm.
 * User: EL MARSSI Tarek
 * Date: 07/12/2016
 * Time: 09:37
 */
class User
{
    private $id_user;
    private $is_admin;
    private $id_ville;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $sexe;
    private $date_naissance;

    /**
     * User constructor.
     */
    public function __construct($data) {
        if (isset($data)) {
            $this->hydrate($data);
        }
    }

    /**
     * User Hydratation
     * @param $data
     */
    public function hydrate($data) {
        foreach ($data as $key => $value) {
            $setter = $key;
            $method = '';

            if (strpos($setter, '_')) {
                $first = ucfirst(strstr($setter, '_', true));
                $last = ucfirst(substr(strstr($setter, '_'), 1));
                $method = 'set' . $first . $last;
            } else {
                $method = 'set' . ucfirst($setter);
            }
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->is_admin;
    }

    /**
     * @param mixed $is_admin
     */
    public function setIsAdmin($is_admin)
    {
        $this->is_admin = $is_admin;
    }

    /**
     * @return mixed
     */
    public function getIdVille()
    {
        return $this->id_ville;
    }

    /**
     * @param mixed $id_ville
     */
    public function setIdVille($id_ville)
    {
        $this->id_ville = $id_ville;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * @param mixed $date_naissance
     */
    public function setDateNaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }


}