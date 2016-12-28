<?php
require_once(__DIR__.'/../abstract/Entity.php');

class Notification extends Entity {

    private $id_notification;
    private $user_fk;
    private $content;
    private $created_on;
    private $is_new;

    // GETTERS & SETTERS

    public function getIdNotification() {
        return $this->id_notification;
    }

    public function setIdNotification($id_notification) {
        $this->id_notification = $id_notification;
    }

    public function getUserFk() {
        return $this->user_fk;
    }

    public function setUserFk($user_fk) {
        $this->user_fk = $user_fk;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getCreatedOn() {
        return $this->created_on;
    }

    public function setCreatedOn($created_on) {
        $this->created_on = $created_on;
    }

    public function getIsNew() {
        return $this->is_new;
    }

    public function setIsNew($is_new) {
        $this->is_new = $is_new;
    }
}