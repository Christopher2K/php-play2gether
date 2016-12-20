<?php

/**
 * Created by PhpStorm.
 * User: EL MARSSI Tarek
 * Date: 14/12/2016
 * Time: 11:34
 */
class Pratique
{
    private $sportID;
    private $userID;

    /**
     * Pratique constructor.
     * @param $sportID
     * @param $userID
     */
    public function __construct($sportID, $userID)
    {
        $this->sportID = $sportID;
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

    


}