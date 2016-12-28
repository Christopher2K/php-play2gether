<?php
require_once(__DIR__.'/../abstract/DAO.php');
require_once(__DIR__.'/../entity/Sport.php');

class SportDAO extends DAO {

    public function __construct(PDO $db) {
        parent::__construct($db);
        $this->entity_name = 'Sport';
    }
}