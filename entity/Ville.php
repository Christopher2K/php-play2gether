<?php

/**
 * Created by PhpStorm.
 * User: EL MARSSI Tarek
 * Date: 12/12/2016
 * Time: 17:24
 */
class Ville
{
    private $villeID;
    private $nomville;
    private $codePostal;

    /**
     * Ville constructor.
     * @param $villeID
     * @param $nomville
     * @param $codePostal
     */
    public function __construct($villeID, $nomville, $codePostal)
    {
        $this->villeID = $villeID;
        $this->nomville = $nomville;
        $this->codePostal = $codePostal;
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
    public function getNomville()
    {
        return $this->nomville;
    }

    /**
     * @param mixed $nomville
     */
    public function setNomville($nomville)
    {
        $this->nomville = $nomville;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param mixed $codePostal
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    }

    


}