<?php

/**
 * Created by PhpStorm.
 * User: EL MARSSI Tarek
 * Date: 13/12/2016
 * Time: 16:24
 */
class CommentaireDAO
{
    private $selectAll;
    private $selectByCommID;
    private $selectByAnnonce;
    private $selectByDate;
    private $selectByUser;
    private $create;
    private $update;
    private $delete;
    private $dbh;

    /**
     * CommentaireDAO constructor.
     * @param $dbh
     */
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
        $this->selectAll=$this->dbh->prepare("SELECT * FROM Commentaire");
        $this->selectByCommID=$this->dbh->prepare("SELECT * FROM Commentaire WHERE ID_COMMENTAIRE=?");
        $this->selectByDate=$this->dbh->prepare("SELECT * FROM Commentaire WHERE DATECOMM=?");
        $this->$this->selectByAnnonce=$this->dbh->prepare("SELECT * FROM Commentaire WHERE ID_ANNONCE=?");
        $this->selectByUser=$this->dbh->prepare("SELECT * FROM Commentaire WHERE ID_USER=?");
        $this->create=$this->dbh->prepare("INSERT INTO Commentaire (ID_COMMENTAIRE, ID_USER, ID_ANNONCE, DESCRIPTION, DATECOMM))
                                           VALUES (?,?,?,?,?)");
        $this->update=$this->dbh->prepare("UPDATE commentaire SET ID_USER=?,ID_ANNONCE=?,DESCRIPTION=?,DATECOMM=? WHERE ID_COMMENTAIRE=?");
        $this->delete=$this->dbh->prepare("DELETE FROM COMMENTAIRE WHERE ID_COMMENTAIRE=?");
    }

    public function selectAll(){
        $this->selectAll->execute();
        return $this->selectAll->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByID($commID){
        $this->selectByID->execute(array($commID));
        return $this->selectByID->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByDate($commDate){
        $this->selectByDate->execute(array($commDate));
        return $this->selectByDate->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByAnnonceID($annonceID){
        $this->selectByAnnonce->execute(array($annonceID));
        return $this->selectByAnnonce->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function selectByUserID($userID){
        $this->selectByUser->execute(array($userID));
        return $this->selectByUser->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}