<?php
require_once(__DIR__.'/../abstract/Entity.php');

class User extends Entity {

    private $id_user;
    private $first_name;
    private $last_name;
    private $gender;
    private $birth_date;
    private $city_fk;
    private $email;
    private $password;
    private $is_admin;
    private $date_joigned;
    private $number;

    public static function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function toArray($option) {
        $array['last_name'] = $this->last_name;
        $array['first_name'] = $this->first_name;
        $array['gender'] = $this->gender;
        $array['birth_date'] = $this->birth_date;
        $array['city_fk'] = $this->city_fk;
        $array['email'] = $this->email;
        $array['number'] = $this->number;
        $array['password'] = $this->password;

        switch ($option) {
            case 'update':
                $array['id_user'] = $this->id_user;
                $array['$is_admin'] = $this->is_admin;
                break;
            case 'create':
                $array['password'] = User::hashPassword($this->password);
                break;
            default:
                break;
        }

        return $array;
    }

    public function getMessageSubscriber(User $user) {
        return "Bonjour ! Vous venez d'accepter une annonce ! Vous pouvez contacter la personne dès maintenant : " . $user->getLastName(). " " .$user->getFirstName(). " ,Tel : " . $user->getNumber();

    }

    public function getMessageAdCreator(User $user) {
        return "Bonjour ! Votre annonce a été acceptée ! Vous pouvez contacter la personne dès maintenant : ".$user->getLastName()." ".$user->getFirstName()." ,Tel : ".$user->getNumber();
    }

    // OVERRIDE

    public function __toString() {
        return $this->first_name.' '.$this->last_name;
    }

    // GETTERS & SETTERS

    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getBirthDate() {
        return $this->birth_date;
    }

    public function setBirthDate($birth_date) {
        $this->birth_date = $birth_date;
    }

    public function getCityFk() {
        return $this->city_fk;
    }

    public function setCityFk($city_fk) {
        $this->city_fk = $city_fk;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getNumber() {
        return '+33' . substr($this->number, 1);
    }

    public function setNumber($number) {
        $this->number = $number;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getIsAdmin() {
        return $this->is_admin;
    }

    public function setIsAdmin($is_admin) {
        $this->is_admin = $is_admin;
    }

    public function getDateJoigned() {
        return $this->date_joigned;
    }

    public function setDateJoigned($date_joigned) {
        $this->date_joigned = $date_joigned;
    }


}