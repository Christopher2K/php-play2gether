<?php

/**
 * Created by PhpStorm.
 * User: Tito
 * Date: 14/12/2016
 * Time: 10:50
 */
class RegionDAO
{
    private $dbh;
    private $selectAll;
    private $selectByID;
    private $selectByLibelle;

    /**
     * RegionDAO constructor.
     * @param $dbh
     */
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
        $this->selectAll=$this->dbh->prepare("SELECT * FROM Region");
        $this->selectByID=$this->dbh->prepare("SELECT * FROM Region WHERE ID_REGION=?");
        $this->selectByLibelle=$this->dbh->prepare("SELECT * FROM Region WHERE LIBELLE=?");
    }

    public function selectAll(){
        $this->selectAll->execute();
        return $this->selectAll->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByID($regionID){
        $this->selectByID->execute(array($regionID));
        return $this->selectByID->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByLibelle($libelle){
        $this->selectByLibelle->execute(array($libelle));
        return $this->selectByLibelle->fetchAll(\PDO::FETCH_ASSOC);
    }


}