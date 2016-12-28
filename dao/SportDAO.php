<?php
require_once('../abstract/DAO.php');
require_once('../entity/Sport.php');

class SportDAO extends DAO {

    public function __construct(PDO $db) {
        parent::__construct($db);
        $this->entity_name = 'Sport';
    }
}