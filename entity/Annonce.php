<?php

/**
 * Created by PhpStorm.
 * User: Tito
 * Date: 13/12/2016
 * Time: 16:40
 */
class Annonce
{

    private $annonceID;
    private $userID;
    private $sportID;
    private $villeID;
    private $dateAnnonce;
    private $dateEvenement;
    private $titre;
    private $description;
    private $nbJoueursMax;
    private $status;

    /**
     * Annonce constructor.
     * @param $annonceID
     * @param $userID
     * @param $sportID
     * @param $villeID
     * @param $dateAnnonce
     * @param $dateEvenement
     * @param $titre
     * @param $description
     * @param $nbJoueursMax
     * @param $status
     */
    public function __construct($annonceID, $userID, $sportID, $villeID, $dateAnnonce, $dateEvenement, $titre, $description, $nbJoueursMax, $status)
    {
        $this->annonceID = $annonceID;
        $this->userID = $userID;
        $this->sportID = $sportID;
        $this->villeID = $villeID;
        $this->dateAnnonce = $dateAnnonce;
        $this->dateEvenement = $dateEvenement;
        $this->titre = $titre;
        $this->description = $description;
        $this->nbJoueursMax = $nbJoueursMax;
        $this->status = $status;
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
    public function getSportID()
    {
        return $this->sportID;
    }

    /**
     * @param mixed $sportID
     */
    public function setSportID($sportID)
    {
        $this->sportID = $sportID;
    }

    /**
     * @return mixed
     */
    public function getVilleID()
    {
        return $this->villeID;
    }

    /**
     * @param mixed $villeID
     */
    public function setVilleID($villeID)
    {
        $this->villeID = $villeID;
    }

    /**
     * @return mixed
     */
    public function getDateAnnonce()
    {
        return $this->dateAnnonce;
    }

    /**
     * @param mixed $dateAnnonce
     */
    public function setDateAnnonce($dateAnnonce)
    {
        $this->dateAnnonce = $dateAnnonce;
    }

    /**
     * @return mixed
     */
    public function getDateEvenement()
    {
        return $this->dateEvenement;
    }

    /**
     * @param mixed $dateEvenement
     */
    public function setDateEvenement($dateEvenement)
    {
        $this->dateEvenement = $dateEvenement;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
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
    public function getNbJoueursMax()
    {
        return $this->nbJoueursMax;
    }

    /**
     * @param mixed $nbJoueursMax
     */
    public function setNbJoueursMax($nbJoueursMax)
    {
        $this->nbJoueursMax = $nbJoueursMax;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }




}