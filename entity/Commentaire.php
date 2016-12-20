<?php

/**
 * Created by PhpStorm.
 * User: Tito
 * Date: 13/12/2016
 * Time: 16:22
 */
class Commentaire
{
    private $commentaireID;
    private $userID;
    private $annonceID;
    private $description;
    private $dateCommentaire;

    /**
     * Commentaire constructor.
     * @param $commentaireID
     * @param $userID
     * @param $annonceID
     * @param $description
     * @param $dateCommentaire
     */
    public function __construct($commentaireID, $userID, $annonceID, $description, $dateCommentaire)
    {
        $this->commentaireID = $commentaireID;
        $this->userID = $userID;
        $this->annonceID = $annonceID;
        $this->description = $description;
        $this->dateCommentaire = $dateCommentaire;
    }

    /**
     * @return mixed
     */
    public function getCommentaireID()
    {
        return $this->commentaireID;
    }

    /**
     * @param mixed $commentaireID
     */
    public function setCommentaireID($commentaireID)
    {
        $this->commentaireID = $commentaireID;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getAnnonceID()
    {
        return $this->annonceID;
    }

    /**
     * @param mixed $annonceID
     */
    public function setAnnonceID($annonceID)
    {
        $this->annonceID = $annonceID;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDateCommentaire()
    {
        return $this->dateCommentaire;
    }

    /**
     * @param mixed $dateCommentaire
     */
    public function setDateCommentaire($dateCommentaire)
    {
        $this->dateCommentaire = $dateCommentaire;
    }

    


}