<?php

/**
 * Created by PhpStorm.
 * User: EL MARSSI Tarek
 * Date: 14/12/2016
 * Time: 10:46
 */
class Region
{
    private $regionID;
    private $libelle;

    /**
     * Region constructor.
     * @param $regionID
     * @param $libelle
     */
    public function __construct($regionID, $libelle)
    {
        $this->regionID = $regionID;
        $this->libelle = $libelle;
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



}