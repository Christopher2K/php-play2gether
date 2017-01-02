<?php

require_once(__DIR__ . '/../abstract/DAO.php');

class AdDAO extends DAO {

    static $CREATE = "INSERT INTO Ad(creator_fk, sport_fk, title, content, date, max_players, city_fk) VALUES (?, ?, ?, ?, ?, ?, ?)";
    static $DELETE = "DELETE FROM Ad WHERE id_ad=?";

    public function __construct($db) {
        parent::__construct($db);
        $this->entity_name = 'Ad';
    }

    public function initCustomQueries() {
        $this->customQueries[ 'create' ] = $this->db->prepare(AdDAO::$CREATE);
        $this->customQueries[ 'delete' ] = $this->db->prepare(AdDAO::$DELETE);
    }

    public function create(Ad $ad) {
        $request_array = [];
        foreach ($ad->toArray('create') as $value) {
            array_push($request_array, $value);
        }
        $this->customQueries[ 'create' ]->execute($request_array);

        return $this->db->lastInsertId();
    }

    public function delete(Ad $ad) {
        $request_array = [$ad->getIdAd()];
        $delete_count = $this->customQueries[ 'delete' ]->execute($request_array);

        return $delete_count;
    }
}