<?php

/**
 * Created by PhpStorm.
 * User: Tito
 * Date: 13/12/2016
 * Time: 15:08
 */

class DepartementDAO
{
    private $dbh;
    private $selectAll;
    private $selectByID;
    private $selectByDepartementName;
    private $selectAllDepartementCities;

    /**
     * DepartementDAO constructor.
     * @param $dbh
     */
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
        $this->selectAll=$this->dbh->prepare("SELECT * FROM Departement");
        $this->selectByID=$this->dbh->prepare("SELECT * FROM Departement WHERE ID_DEPARTEMENT=?");
        $this->selectByDepartementName=$this->dbh->prepare("SELECT * FROM Departement WHERE libelle=?");
        $this->selectAllDepartementCities=$this->dbh->prepare
        ("SELECT villes_france_free.ville_id ,villes_france_free.ville_nom,
          villes_france_free.ville_code_postal 
          FROM villes_france_free JOIN departement 
          ON (villes_france_free.ville_departement=departement.ID_DEPARTEMENT) 
          WHERE Departement.id_departement=?
          ORDER BY villes_france_free.ville_nom ASC");
    }


    public function getDepartementCities($departementID){
        $this->selectAllDepartementCities->execute(array($departementID));
        return $this->selectAllDepartementCities->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getDepartementByID($departementID){
        $this->selectByID->execute(array($departementID));
        return $this->selectByID->fetchAll(\PDO::FETCH_ASSOC);


    }





}
