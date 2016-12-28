<?php
require_once ('../abstract/Entity.php');

class Department extends Entity {

    private $id_department;
    private $region_fk;
    private $name;

    // GETTERS & SETTERS

    public function getIdDepartment() {
        return $this->id_department;
    }

    public function setIdDepartment($id_department) {
        $this->id_department = $id_department;
    }

    public function getRegionFk() {
        return $this->region_fk;
    }

    public function setRegionFk($region_fk) {
        $this->region_fk = $region_fk;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}