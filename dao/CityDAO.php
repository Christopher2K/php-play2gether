<?php
require_once(__DIR__.'/../abstract/DAO.php');

class CityDAO extends DAO {

    // Custom Queries
    static $SEARCH = 'SELECT * FROM City WHERE name LIKE ? ORDER BY name ASC';

    public function __construct(PDO $db) {
        parent::__construct($db);
        $this->entity_name = 'City';
    }

    public function initCustomQueries() {
        $this->customQueries[ 'search' ] = $this->db->prepare(CityDAO::$SEARCH);
    }

    public function search($string) {
        $this->customQueries[ 'search' ]->execute([$string . '%']);

        return $this->renderData($this->customQueries[ 'search' ]);
    }
}