<?php
/**
 * Created by PhpStorm.
 * User: EL MARSSI Tarek
 * Date: 01/12/2016
 * Time: 19:37
 */


class Sport
{
    private $idSport;
    private $nomSport;


    /**
     * Sport constructor.
     * @param $idSport
     * @param $nomSport
     */
    public function __construct($idSport, $nomSport)
    {

        $this->idSport = $idSport;
        $this->nomSport = $nomSport;
    }


    public function getIdSport()
    {
        return $this->idSport;
    }

    public function setIdSport($idSport)
    {
        $this->idSport = $idSport;
    }

    public function getNomSport()
    {
        return $this->nomSport;
    }

    public function setNomSport($nomSport)
    {
        $this->nomSport = $nomSport;
    }




}