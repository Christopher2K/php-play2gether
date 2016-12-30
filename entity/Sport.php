<?php
require_once(__DIR__ . '/../abstract/Entity.php');

class Sport extends Entity {

    private $id_sport;
    private $name;

    public function toArray() {
        return [
            'id_sport' => $this->id_sport,
            'name'     => $this->name
        ];
    }

    // GETTERS && SETTERS

    public function getIdSport() {
        return $this->id_sport;
    }

    public function setIdSport($id_sport) {
        $this->id_sport = $id_sport;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}