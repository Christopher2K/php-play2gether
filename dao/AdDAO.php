<?php

require_once(__DIR__ . '/../abstract/DAO.php');
require_once(__DIR__ . '/../entity/Ad.php');


class AdDAO extends DAO {

    static $CREATE = "INSERT INTO Ad(creator_fk, sport_fk, title, content, date, max_players, city_fk) VALUES (?, ?, ?, ?, ?, ?, ?)";
    static $UPDATE = "UPDATE Ad SET  sport_fk=?, title=?, content=?, date=?, max_players=?, city_fk=? WHERE id_ad=?";
    static $DELETE = "DELETE FROM Ad WHERE id_ad=?";

    static $CHANGE_STATUS = "UPDATE Ad SET status_fk=? WHERE id_ad=?";

    public function __construct($db) {
        parent::__construct($db);
        $this->entity_name = 'Ad';
    }

    public function initCustomQueries() {
        $this->customQueries[ 'create' ] = $this->db->prepare(AdDAO::$CREATE);
        $this->customQueries[ 'update' ] = $this->db->prepare(AdDAO::$UPDATE);
        $this->customQueries[ 'delete' ] = $this->db->prepare(AdDAO::$DELETE);
        $this->customQueries[ 'change_status' ] = $this->db->prepare(AdDAO::$CHANGE_STATUS);
    }

    public function create(Ad $ad) {
        $request_array = [];
        foreach ($ad->toArray('create') as $value) {
            array_push($request_array, $value);
        }
        $this->customQueries[ 'create' ]->execute($request_array);

        return $this->db->lastInsertId();
    }

    public function update(Ad $ad) {
        $request_array = [];
        foreach ($ad->toArray('update') as $value) {
            array_push($request_array, $value);
        }
        $this->customQueries[ 'update' ]->execute($request_array);

        return $this->db->lastInsertId();
    }

    public function delete(Ad $ad) {
        $request_array = [$ad->getIdAd()];
        $delete_count = $this->customQueries[ 'delete' ]->execute($request_array);

        return $delete_count;
    }

    public function changeStatus($id_ad, $status_id) {
        $request_array = [$status_id, $id_ad];
        $update_count = $this->customQueries[ 'change_status' ]->execute($request_array);

        return $update_count;
    }
}