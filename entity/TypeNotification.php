<?php

/**
 * Created by PhpStorm.
 * User: Tito
 * Date: 14/12/2016
 * Time: 11:07
 */
class TypeNotification
{
    private $typeID;
    private $nomType;

    /**
     * TypeNotification constructor.
     * @param $typeID
     * @param $nomType
     */
    public function __construct($typeID, $nomType)
    {
        $this->typeID = $typeID;
        $this->nomType = $nomType;
    }

    /**
     * @return mixed
     */
    public function getTypeID()
    {
        return $this->typeID;
    }

    /**
     * @param mixed $typeID
     */
    public function setTypeID($typeID)
    {
        $this->typeID = $typeID;
    }

    /**
     * @return mixed
     */
    public function getNomType()
    {
        return $this->nomType;
    }

    /**
     * @param mixed $nomType
     */
    public function setNomType($nomType)
    {
        $this->nomType = $nomType;
    }

    


}