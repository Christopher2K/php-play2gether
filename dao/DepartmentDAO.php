<?php
require_once(__DIR__.'/../abstract/DAO.php');
require_once(__DIR__.'/../entity/Department.php');

class DepartmentDAO extends DAO {

    public function __construct(PDO $db) {
        parent::__construct($db);
        $this->entity_name = 'Department';
    }

}
