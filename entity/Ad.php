<?php
require_once(__DIR__ . '/../abstract/Entity.php');

class Ad extends Entity {

    // STATUS
    static $STATUS_TERMINATED = 1;
    static $STATUS_IN_PROGRESS = 2;
    static $STATUS_FULL = 3;

    private $id_ad;
    private $creator_fk;
    private $sport_fk;
    private $status_fk;
    private $title;
    private $content;
    private $created_on;
    private $date;
    private $max_players;
    private $city_fk;

    public function toArray($option) {
        $array = [];

        switch ($option) {
            case 'create':
                $array[ 'creator_fk' ] = $this->creator_fk;
                $array[ 'spork_fk' ] = $this->sport_fk;
                $array[ 'title' ] = $this->title;
                $array[ 'content' ] = $this->content;
                $array[ 'date' ] = $this->date;
                $array[ 'max_players' ] = $this->max_players;
                $array[ 'city_fk' ] = $this->city_fk;
                break;
            case 'update':
                $array[ 'spork_fk' ] = $this->sport_fk;
                $array[ 'title' ] = $this->title;
                $array[ 'content' ] = $this->content;
                $array[ 'date' ] = $this->date;
                $array[ 'max_players' ] = $this->max_players;
                $array[ 'city_fk' ] = $this->city_fk;
                $array[ 'id_ad' ] = $this->id_ad;
                break;
            default:
                break;
        }

        return $array;
    }
    
    public function isCreator(User $user) {
        return $user->getIdUser() == $this->creator_fk;
    }

    public function hasSubscribe(User $user, $user_list) {
        foreach ($user_list as $user_ad) {
            if ($user_ad->getIdUser() == $user->getIdUser()) {
                return TRUE;
            }
        }

        return FALSE;
    }

    public function isFull($user_list) {
        return count($user_list) >= intval($this->max_players);
    }

    // GETTERS & SETTERS

    public function getIdAd() {
        return $this->id_ad;
    }

    public function setIdAd($id_ad) {
        $this->id_ad = $id_ad;
    }

    public function getCreatorFk() {
        return $this->creator_fk;
    }

    public function setCreatorFk($creator_fk) {
        $this->creator_fk = $creator_fk;
    }

    public function getSportFk() {
        return $this->sport_fk;
    }

    public function setSportFk($sport_fk) {
        $this->sport_fk = $sport_fk;
    }

    public function getStatusFk() {
        return $this->status_fk;
    }

    public function setStatusFk($status_fk) {
        $this->status_fk = $status_fk;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
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

    public function getDate($formated = True) {
        if ($formated) {
            $temp = explode('-', $this->date);
            $temp_bis = $temp[ 2 ];
            $temp[ 2 ] = $temp[ 0 ];
            $temp[ 0 ] = $temp_bis;

            return implode('/', $temp);
        } else {
            return $this->date;
        }

    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getMaxPlayers() {
        return $this->max_players;
    }

    public function setMaxPlayers($max_players) {
        $this->max_players = $max_players;
    }

    public function getCityFk() {
        return $this->city_fk;
    }

    public function setCityFk($city_fk) {
        $this->city_fk = $city_fk;
    }
}