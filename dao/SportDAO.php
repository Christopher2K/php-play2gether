<?php
/**
 * Created by PhpStorm.
 * User: EL MARSSI Tarek
 * Date: 01/12/2016
 * Time: 20:00
 */


require "Sport.php";

class SportDAO
{
    private $dbh;
    private $selectAll;
    private $selectByID;
    private $selectBySportName;
    private $insert;
    private $update;
    private $delete;

    /**
     * SportDAO constructor.
     */
    public function __construct($dbh)
    {
        $this->dbh=$dbh;
        $this->selectAll=$this->dbh->prepare("SELECT * FROM Sport");
        $this->selectByID=$this->dbh->prepare("SELECT * FROM Sport WHERE idSport=?");
        $this->selectBySportName=$this->dbh->prepare("SELECT * FROM Sport WHERE nomSport=?");
        $this->insert=$this->dbh->prepare("INSERT INTO Sport(nomSport)
                                           VALUES (?)");
        $this->update=$this->dbh->prepare("UPDATE Sport SET nomSport=?
                                           WHERE IDSport=?");
        $this->delete=$this->dbh->prepare("DELETE FROM Sport WHERE IDSport=?");
    }

    public function selectAll(){
        $this->selectAll->execute();
        return $this->selectAll->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function selectByID($sportID){
        $this->selectByID($sportID)->execute(array($sportID));
        return $this->selectByID->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectBySportName($nomSport){
        $this->selectBySportName->execute(array($nomSport));
        return $this->selectBySportName->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertSport($nomSport){
        $insertCount=$this->insert->execute(array($nomSport));
        return $insertCount;

    }

    public function updateSport($sportID, $nomSport){
        $updateCount=$this->update->execute(array($nomSport, $sportID));
        return $updateCount;
    }

    public function deleteSport($sportID){
        $delete=$this->delete->execute(array($sportID));
        return $delete;
    }


}