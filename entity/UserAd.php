<?php
require_once ('User.php');
require_once ('Ad.php');

class UserAd {

    private $user;
    private $ad;

    public function __construct(User $user, Ad $ad) {
        $this->user = $user;
        $this->ad = $ad;
    }

    // GETTERS && SETTERS

    public function getUser(): User {
        return $this->user;
    }

    public function setUser(User $user) {
        $this->user = $user;
    }

    public function getAd(): Ad {
        return $this->ad;
    }

    public function setAd(Ad $ad) {
        $this->ad = $ad;
    }
}