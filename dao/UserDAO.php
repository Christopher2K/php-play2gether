<?php
require_once(__DIR__.'/../abstract/DAO.php');
require_once(__DIR__.'/../entity/User.php');

class UserDAO extends DAO {

    // Custom Queries
    static $CREATE = "INSERT INTO User(first_name, last_name, gender, birth_date, city_fk, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)";

    public function __construct(PDO $db) {
        parent::__construct($db);
        $this->entity_name = 'User';
    }

    protected function initCustomQueries() {
        $this->customQueries[ 'create' ] = $this->db->prepare(UserDAO::$CREATE);
    }

    // Execute custom queries
    public function create(User $user) {
        $request_array = [];
        foreach ($user->toArray('create') as $value) {
            array_push($request_array, $value);
        }
        $insertCount = $this->customQueries[ 'create' ]->execute($request_array);
        return $insertCount;
    }


    public function logIn($email, $password) {
        $user = $this->select(['email' => $email])[ 0 ];

        if ($user) {
            if (password_verify($password, $user->getPassword())) {
                return $user;
            }
        }

        return FALSE;
    }
}