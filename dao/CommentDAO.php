<?php
require_once(__DIR__.'/../abstract/DAO.php');
require_once(__DIR__.'/../entity/Comment.php');

class CommentDAO extends DAO {

    // Custom Queries
    static $CREATE = "INSERT INTO Comment(author_fk, ad_fk, content) VALUES (?, ?, ?)";
    static $DELETE = "DELETE FROM Comment WHERE id_comment=?";

    public function __construct(PDO $db) {
        parent::__construct($db);
        $this->entity_name = 'Comment';
    }

    public function initCustomQueries() {
        $this->customQueries[ 'create' ] = $this->db->prepare(CommentDAO::$CREATE);
        $this->customQueries[ 'delete' ] = $this->db->prepare(CommentDAO::$DELETE);
    }

    // Execute custom queries
    public function create(Comment $comment) {
        $request_array = [];
        foreach ($comment->toArray() as $value) {
            array_push($request_array, $value);
        }
        $insertCount = $this->customQueries[ 'create' ]->execute($request_array);
        return $insertCount;
    }

    public function delete(Comment $comment) {
        $deleteCount = $this->customQueries[ 'delete' ]->execute([$comment->getIdComment()]);
        return $deleteCount;
    }
}