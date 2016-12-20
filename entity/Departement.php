<?php

/**
 * Created by PhpStorm.
 * User: Tito
 * Date: 13/12/2016
 * Time: 13:26
 */
class Departement
{
    private $departementID;
    private $regionID;
    private $libelle;
//    private $villes;
    /**
     * Departement constructor.
     * @param $departementID
     * @param $regionID
     * @param $libelle
     * @param $villes
     */
    public function __construct($departementID, $regionID, $libelle)
    {
        $this->departementID = $departementID;
        $this->regionID = $regionID;
        $this->libelle = $libelle;
//        $this->villes = new ArrayObject();

    }

    /**
     * @return mixed
     */
    public function getDepartementID()
    {
        return $this->departementID;
    }

    /**
     * @param mixed $departementID
     */
    public function setDepartementID($departementID)
    {
        $this->departementID = $departementID;
    }

    /**
     * @return mixed
     */
    public function getRegionID()
    {
        return $this->regionID;
    }

    /**
     * @param mixed $regionID
     */
    public function setRegionID($regionID)
    {
        $this->regionID = $regionID;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return ArrayObject
     */
    public function getVilles()
    {
        return $this->villes;
    }

    /**
     * @param ArrayObject $villes
     */
    public function setVilles($villes)
    {
        $this->villes = $villes;
    }





}