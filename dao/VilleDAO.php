<?php

/**
 * Created by PhpStorm.
 * User: EL MARSSI Tarek
 * Date: 12/12/2016
 * Time: 17:28
 */
class VilleDAO
{
    private $dbh;
    private $selectAll;
    private $selectByID;
    private $selectByName;
    private $selectByZipCode;

    /**
     * VilleDAO constructor.
     * @param $selectAll
     * @param $selectByID
     * @param $selectByName
     * @param $selectByZipCode
     */
    public function __construct($dbh)
    {
        $this->dbh=$dbh;
        $this->selectAll = $this->dbh->prepare("SELECT ville_id, ville_nom_reel FROM villes_france_free ORDER BY ville_nom ASC");
        $this->selectByID = $this->dbh->prepare("SELECT ville_id, ville_nom, ville_code_postal FROM villes_france_free WHERE ville_id=? ORDER BY ville_nom ASC");
        $this->selectByName = $this->dbh->prepare("SELECT ville_id, ville_nom_reel FROM villes_france_free WHERE ville_nom_reel LIKE ? ORDER BY ville_nom_reel ASC");
        $this->selectByZipCode = $this->dbh->prepare("SELECT ville_id, ville_nom, ville_code_postal FROM villes_france_free WHERE ville_code_postal=?");
    }


    public function selectAll(){
        $this->selectAll->execute();
        return $this->selectAll->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectByID($villeID){
        $this->selectByID->execute(array($villeID));
        return $this->selectByID->fetchAll(\PDO::FETCH_ASSOC);
    }

    public  function selectByName($villeName){
        $this->selectByName->execute(array($villeName .'%'));
        return $this->selectByName->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByZipCode($zipCode){
        $this->selectByZipCode->execute($zipCode);
        return $this->selectByZipCode->fetchAll(\PDO::FETCH_ASSOC);
    }

}