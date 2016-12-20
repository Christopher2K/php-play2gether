<?php

/**
 * Created by PhpStorm.
 * User: EL MARSSI Tarek
 * Date: 14/12/2016
 * Time: 10:56
 */
class Notification
{
    private $notificationID;
    private $typeID;
    private $userID;
    private $description;
    private $dateNotif;
    private $isVue;

    /**
     * Notification constructor.
     * @param $notificationID
     * @param $typeID
     * @param $userID
     * @param $description
     * @param $dateNotif
     * @param $isVue
     */
    public function __construct($notificationID, $typeID, $userID, $description, $dateNotif, $isVue=false)
    {
        $this->notificationID = $notificationID;
        $this->typeID = $typeID;
        $this->userID = $userID;
        $this->description = $description;
        $this->dateNotif = $dateNotif;
        $this->isVue = $isVue;
    }

    /**
     * @return mixed
     */
    public function getNotificationID()
    {
        return $this->notificationID;
    }

    /**
     * @param mixed $notificationID
     */
    public function setNotificationID($notificationID)
    {
        $this->notificationID = $notificationID;
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
    public function getDateNotif()
    {
        return $this->dateNotif;
    }

    /**
     * @param mixed $dateNotif
     */
    public function setDateNotif($dateNotif)
    {
        $this->dateNotif = $dateNotif;
    }

    /**
     * @return boolean
     */
    public function isIsVue()
    {
        return $this->isVue;
    }

    /**
     * @param boolean $isVue
     */
    public function setIsVue($isVue)
    {
        $this->isVue = $isVue;
    }




}