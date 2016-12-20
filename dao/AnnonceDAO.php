<?php

/**
 * Created by PhpStorm.
 * User: Tito
 * Date: 13/12/2016
 * Time: 16:44
 */
class AnnonceDAO
{
    private $createAnnonce;
    private $updateAnnonce;
    private $deleteAnnonce;
    private $selectAll;
    private $selectByID;
    private $selectBySport;
    private $selectByVille;
    private $selectByUser;
    private $selectByDateEvenement;
    private $selectByDateAnnonce;
    private  $dbh;

    /**
     * AnnonceDAO constructor.
     * @param $dbh
     */
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
        $this->selectAll=$this->dbh->prepare("SELECT * FROM Annonce");
        $this->selectByID=$this->dbh->prepare("SELECT * FROM Annonce WHERE ID_ANNONCE=?");
        $this->selectBySport=$this->dbh->prepare("SELECT * FROM Annonce WHERE IDSPORT=?");
        $this->selectByVille=$this->dbh->prepare("SELECT * FROM Annonce WHERE ville_id=?");
        $this->selectByUser=$this->dbh->prepare("SELECT * FROM Annonce WHERE ID_USER=?");
        $this->selectByDateEvenement=$this->dbh->prepare("SELECT * FROM Annonce WEHRE DATEEVENEMENT=?");
        $this->createAnnonce=$this->dbh->prepare("INSERT INTO Annonce 
                                                  (ID_ANNONCE, ID_USER, IDSPORT, ville_id, DATEANNONCE, DATEEVENEMENT, TITRE, DESCRIPTION, NBJOUEURSMAX, STATUS) VALUES
                                                  (?,?,?,?,?,?,?,?,?,?)");
        $this->selectByDateAnnonce=$this->dbh->prepare("SELECT * FROM Annonce WHERE DATEANNONCE=?");
        $this->updateAnnonce=$this->dbh->prepare("UPDATE annonce SET
                                                  ID_USER=?,IDSPORT=?,ville_id=?,DATEANNONCE=?,
                                                  DATEEVENEMENT=?,TITRE=?,DESCRIPTION=?,NBJOUEURSMAX=?,STATUS=? WHERE
                                                  ID_ANNONCE=?");

        $this->deleteAnnonce=$this->dbh->prepare("DELETE FROM Annonce WHERE ID_ANNONCE=? ");
    }


    public function selectAll(){
        $this->selectAll->execute();
        return $this->selectAll->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByID($annonceID){
        $this->selectByID->execute(array($annonceID));
        return $this->selectByID->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectBySport($sportID){
        $this->selectBySport->execute($sportID);
        return $this->selectBySport->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByUser($userID){
        $this->selectByUser->execute(array($userID));
        return $this->selectByUser->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByDateAnnonce($dateAnnonce){
        $this->selectByDateAnnonce->execute($dateAnnonce);
        return $this->selectByDateAnnonce->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByDateEvenement($dateEvenement){
        $this->selectByDateEvenement->execute(array($dateEvenement));
        return $this->selectByDateEvenement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByVille($villeID){
        $this->selectByVille->execute(array($villeID));
        return $this->selectByVille->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createAnnonce($annonce){
        $this->createAnnonce->execute(array($annonce->getAnnonceID, $annonce->getUserID, $annonce->getSportID,
                                            $annonce->getVilleID, $annonce->getDateAnnonce,
                                            $annonce->getDateEvenement, $annonce->getTitre, $annonce->getDescription,
                                            $annonce->getNbJoueursMax, $annonce->getStatus()));

        return $this->createAnnonce->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateAnnonce($annonce){
        $this->updateAnnonce->execute(array($annonce->getUserID, $annonce->getSportID,
            $annonce->getVilleID, $annonce->getDateAnnonce,
            $annonce->getDateEvenement, $annonce->getTitre, $annonce->getDescription,
            $annonce->getNbJoueursMax, $annonce->getStatus(), $annonce->getAnnonceID));
        return $this->updateAnnonce->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteAnnonce($annonceID){
        $this->deleteAnnonce->execute(array($annonceID));
        return $this->deleteAnnonce->fetchAll(\PDO::FETCH_ASSOC);
    }

}