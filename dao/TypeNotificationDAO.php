<?php

/**
 * Created by PhpStorm.
 * User: Tito
 * Date: 14/12/2016
 * Time: 10:58
 */
class TypeNotificationDAO
{
    private $dbh;
    private $selectAll;
    private $selectByID;
    private $selectByTypeName;
    private $create;
    private $update;
    private $delete;

    /**
     * TypeNotification constructor.
     * @param $dbh
     */
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
        $this->selectAll=$this->dbh->prepare("SELECT * FROM TYPENOTIFICATION");
        $this->selectByID=$this->dbh->prepare("SELECT * FROM TypeNotification WHERE ID_TYPE=?");
        $this->selectByTypeName=$this->dbh->prepare("SELECT * FROM TypeNotification WHERE NOMTYPE=?");
        $this->create=$this->dbh->prepare("INSERT INTO TypeNotification (ID_TYPE,NOMTYPE) VALUES (?,?)");
        $this->update=$this->dbh->prepare("UPDATE TypeNotification SET NOMTYPE=? WHERE ID_TYPE=?");
        $this->delete=$this->dbh->prepare("DELETE FROM TypeNotification WHERE ID_TYPE=?");
    }


    public function selectAll()
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByID($typeID){
        $this->selectByID->execute(array($typeID));
        return $this->selectByID->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByTypeName($nomType){
        $this->selectByTypeName->execute(array($nomType));
        return $this->selectByTypeName->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create($type){
        $insertConfirm=$this->create->execute(array($type->getTypeID(), $type->getNomType));
        return $insertConfirm;
    }

    public function update($type){
        $updateVerif=$this->update->execute(array($type->getNomType, $type->getTypeID()));
        return $updateVerif;
    }

    public function delete($typeID){
        $deleteConfirm=$this->delete->execute(array($typeID));
        return $deleteConfirm;
    }
    


}