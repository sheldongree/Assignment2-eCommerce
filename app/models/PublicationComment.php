<?php
namespace app\models;

use PDO;

class PublicationComment extends \app\core\Model {
    public $publication_comment_id;
    public $publication_id;
    public $profile_id;
    public $comment_text;
    public $timestamp;

    public function getAll($publication_id) {
        $SQL = "SELECT * FROM publication_comment WHERE publication_id = :publication_id";
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_id' => $publication_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\PublicationComment');
        return $STMT->fetchAll();
    }

    public function get($publication_comment_id) {
        $SQL = "SELECT * FROM publication_comment WHERE publication_comment_id = :publication_comment_id";
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_comment_id' => $publication_comment_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\PublicationComment');
        return $STMT->fetch();
    }

    public function insert() {
        $SQL = "INSERT INTO publication_comment (publication_id, profile_id, comment_text, timestamp) VALUES (:publication_id, :profile_id, :comment_text, :timestamp)";
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'publication_id' => $this->publication_id,
            'profile_id' => $this->profile_id,
            'comment_text' => $this->comment_text,
            'timestamp' => $this->timestamp
        ]);
    }

    public function update($publication_comment_id, $comment_text) {
        $SQL = "UPDATE publication_comment SET comment_text = :comment_text WHERE publication_comment_id = :publication_comment_id";
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['comment_text' => $comment_text, 'publication_comment_id' => $publication_comment_id]);
    }    

    public function delete($publication_comment_id) {
        $SQL = "DELETE FROM publication_comment WHERE publication_comment_id = :publication_comment_id";
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_comment_id' => $publication_comment_id]);
    }    

    public function getAllByPublicationId($publication_id) {
        $SQL = 'SELECT * FROM publication_comment WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_id' => $publication_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\PublicationComment');
        return $STMT->fetchAll();
    }

    public function getAllByProfileId($profile_id) {
        $SQL = 'SELECT * FROM publication_comment WHERE profile_id = :profile_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['profile_id' => $profile_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\PublicationComment');
        return $STMT->fetchAll();
    }

    public function deleteByPublicationId($publication_id) {
        $SQL = "DELETE FROM publication_comment WHERE publication_id = :publication_id";
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_id' => $publication_id]);
    }
    
}