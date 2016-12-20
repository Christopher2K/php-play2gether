<?php

/**
 * Created by PhpStorm.
 * User: EL MARSSI Tarek
 * Date: 14/12/2016
 * Time: 11:20
 */
class NotificationDAO
{
    private $dbh;
    private $selectAll;
    private $selectByID;
    private $selectByType;
    private $selectByUser;

    /**
     * NotificationDAO constructor.
     * @param $dbh
     */
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
        $this->selectAll=$this->dbh->prepare("SELECT * FROM Notification ");
        $this->selectByID=$this->dbh->prepare("SELECT * FROM Notification WHERE ID_Notification=?");
        $this->selectByType=$this->dbh->prepare("SELECT Notification.*, TypeNotification.NOMTYPE 
                                                 FROM Notification 
                                                 JOIN TypeNotification ON (Notification.ID_TYPE=TypeNotification.ID_TYPE");
        $this->selectByUser=$this->dbh->prepare("SELECT Notification.*, user.nom, User.Prenom, User.pseudo 
                                                 FROM Notification
                                                 JOIN User ON (User.ID_USER=Notification.ID_USER)");
        
    }


}