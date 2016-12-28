<?php
require_once('../abstract/Entity.php');

class City extends Entity {

    private $id_city;
    private $name;
    private $zip_code;
    private $department_fk;

    public function toArray() {
        return [
            'id_city'       => $this->getIdCity(),
            'name'          => $this->getName(),
            'zip_code'      => $this->getZipCode(),
            'department_fk' => $this->getZipCode(),
        ];
    }

    // GETTERS & SETTERS
    public function getIdCity() {
        return $this->id_city;
    }

    public function setIdCity($id_city) {
        $this->id_city = $id_city;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getZipCode() {
        return $this->zip_code;
    }

    public function setZipCode($zip_code) {
        $this->zip_code = $zip_code;
    }

    public function getDepartmentFk() {
        return $this->department_fk;
    }

    public function setDepartmentFk($department_fk) {
        $this->department_fk = $department_fk;
    }
}