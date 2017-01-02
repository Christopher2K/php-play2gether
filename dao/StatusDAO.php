<?php

require_once(__DIR__ . '/../abstract/DAO.php');

class StatusDAO extends DAO {

    public function __construct(PDO $db) {
        parent::__construct($db);
        $this->entity_name = 'Status';
    }
}