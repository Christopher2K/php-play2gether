<?php
require_once ('../abstract/Entity.php');

class Status extends Entity {

    private $id_status;
    private $name;

    // GETTERS && SETTERS

    public function getIdStatus() {
        return $this->id_status;
    }

    public function setIdStatus($id_status) {
        $this->id_status = $id_status;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}