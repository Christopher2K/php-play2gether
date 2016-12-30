<?php
require_once(__DIR__ . '/../abstract/DAO.php');
require_once(__DIR__ . '/../entity/User.php');

class UserDAO extends DAO {

    // Custom Queries
    static $CREATE = "INSERT INTO User(first_name, last_name, gender, birth_date, city_fk, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
    static $ADD_USER_SPORT = "INSERT INTO UserSport(sport_fk, user_fk) VALUES (?, ?)";
    static $UPDATE_CREDENTIALS = "UPDATE User SET email=?, password=? WHERE id_user=?";
    static $UPDATE_IDENTITY = "UPDATE User SET first_name=?, last_name=?, city_fk=? WHERE id_user=?";

    public function __construct(PDO $db) {
        parent::__construct($db);
        $this->entity_name = 'User';
    }

    protected function initCustomQueries() {
        $this->customQueries[ 'create' ] = $this->db->prepare(UserDAO::$CREATE);
        $this->customQueries[ 'add_user_sport' ] = $this->db->prepare(UserDAO::$ADD_USER_SPORT);
        $this->customQueries[ 'update_credentials' ] = $this->db->prepare(UserDAO::$UPDATE_CREDENTIALS);
        $this->customQueries[ 'update_identity' ] = $this->db->prepare(UserDAO::$UPDATE_IDENTITY);

    }

    // Execute custom queries
    public function create(User $user) {
        $request_array = [];
        foreach ($user->toArray('create') as $value) {
            array_push($request_array, $value);
        }
        $insert_count = $this->customQueries[ 'create' ]->execute($request_array);

        return $insert_count;
    }

    public function addUserSport(User $user, $sport_id) {
        $request_array = [$sport_id, $user->getIdUser()];
        $insert_count = $this->customQueries[ 'add_user_sport' ]->execute($request_array);

        return $insert_count;
    }

    public function updateCredentials(User $user, $new_email, $new_password) {
        $request_array = [$new_email, $new_password, $user->getIdUser()];
        $insert_count = $this->customQueries[ 'update_credentials' ]->execute($request_array);

        return $insert_count;
    }

    public function updateIdentity(User $user, $first_name, $last_name, $city_fk) {
        $request_array = [$first_name, $last_name, $city_fk, $user->getIdUser()];
        $insert_count = $this->customQueries[ 'update_identity' ]->execute($request_array);

        return $insert_count;
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