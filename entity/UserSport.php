<?php
require_once ('User.php');
require_once ('Sport.php');

class UserSport {

    private $user;
    private $sport;

    public function __construct(User $user, Sport $sport) {
        $this->user = $user;
        $this->sport = $sport;
    }

    // GETTERS & SETTERS

    public function getUser(): User {
        return $this->user;
    }

    public function setUser(User $user) {
        $this->user = $user;
    }

    public function getSport(): Sport {
        return $this->sport;
    }

    public function setSport(Sport $sport) {
        $this->sport = $sport;
    }
}