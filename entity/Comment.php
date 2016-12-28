<?php
require_once ('../abstract/Entity.php');

class Comment extends Entity {
    private $id_comment;
    private $author_fk;
    private $ad_fk;
    private $content;
    private $posted_on;

    public function toArray() {
        $array['author_fk'] = $this->author_fk;
        $array['ad_fk'] = $this->ad_fk;
        $array['content'] = $this->content;

        return $array;
    }

    // GETTERS & SETTERS

    public function getIdComment() {
        return $this->id_comment;
    }

    public function setIdComment($id_comment) {
        $this->id_comment = $id_comment;
    }

    public function getAuthorFk() {
        return $this->author_fk;
    }

    public function setAuthorFk($author_fk) {
        $this->author_fk = $author_fk;
    }

    public function getAdFk() {
        return $this->ad_fk;
    }

    public function setAdFk($ad_fk) {
        $this->ad_fk = $ad_fk;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function getPostedOn() {
        return $this->posted_on;
    }

    public function setPostedOn($posted_on) {
        $this->posted_on = $posted_on;
    }
}