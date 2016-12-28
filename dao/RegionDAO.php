<?php
require_once(__DIR__.'/../abstract/DAO.php');
require_once(__DIR__.'/../entity/Region.php');

class RegionDAO extends DAO {

    public function __construct(PDO $db) {
        parent::__construct($db);
        $this->entity_name = 'Region';
    }

}