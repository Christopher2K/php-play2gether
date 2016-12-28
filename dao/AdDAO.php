<?php

require_once(__DIR__.'/../abstract/DAO.php');

class AdDAO extends DAO {

    public function __construct($db) {
        parent::__construct($db);
        $this->entity_name = 'Ad';
    }
}