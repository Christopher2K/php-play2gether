<?php
require_once(__DIR__.'/../abstract/Entity.php');

class Region extends Entity {

    private $id_region;
    private $name;

    // GETTERS & SETTERS

    public function getIdRegion() {
        return $this->id_region;
    }

    public function setIdRegion($id_region) {
        $this->id_region = $id_region;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

}