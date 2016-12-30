<?php
require_once(__DIR__ . '/../abstract/DAO.php');

class SportDAO extends DAO {
    static $GET_SPORTS_BY_USER = 'SELECT Sport.id_sport, Sport.name FROM Sport, UserSport WHERE UserSport.user_fk=? AND Sport.id_sport = UserSport.sport_fk';

    public function __construct(PDO $db) {
        parent::__construct($db);
        $this->entity_name = 'Sport';
    }

    protected function initCustomQueries() {
        $this->customQueries[ 'get_sports_by_user' ] = $this->db->prepare(SportDAO::$GET_SPORTS_BY_USER);
    }

    public function getSportsByUser(User $user) {
        $request_array = [$user->getIdUser()];
        $this->customQueries[ 'get_sports_by_user' ]->execute($request_array);
        return $this->renderData($this->customQueries[ 'get_sports_by_user' ]->fetchAll(PDO::FETCH_ASSOC));
    }
}