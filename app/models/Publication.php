<?php
namespace app\models;

use PDO;

class Publication extends \app\core\Model
{
    public $publication_id;
    public $profile_id;
    public $publication_title;
    public $publication_text;
    public $timestamp;
    public $publication_status;

    //implement CRUD

    //insert
    public function insert()
    {
        //define the SQL query
        $SQL = 'INSERT INTO publication (profile_id, publication_title, publication_text, publication_status) VALUES (:profile_id, :publication_title, :publication_text, :publication_status)';
        //prepare the statement
        $STMT = self::$_conn->prepare($SQL);
        //execute
        //(:publication_id, :profile_id, :publication_title, :publication_text, :timestamp, :publiation_status)';
        $data = [
            'profile_id' => $this->profile_id,
            'publication_title' => $this->publication_title,
            'publication_text' => $this->publication_text,
            'publication_status' => $this->publication_status
        ];
        $STMT->execute($data);

        
    }

        // Retrieve a publication by its ID
    public function getById($publication_id) {
        $SQL = 'SELECT * FROM publication WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_id' => $publication_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetch();
    }

    public function getAllPublications(){
        $SQL = 'SELECT * FROM publication WHERE publication_status = "public"';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
    }

    public function update($publication) {
        $SQL = 'UPDATE publication SET publication_title = :publication_title, publication_text = :publication_text, publication_status = :publication_status WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'publication_id' => $publication->publication_id,
            'publication_title' => $publication->publication_title,
            'publication_text' => $publication->publication_text,
            'publication_status' => $publication->publication_status
        ]);
    }

    public function delete($publication_id) {
        $SQL = 'DELETE FROM publication WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['publication_id' => $publication_id]);
    }

    public function getByProfileId($profile_id) {
        $SQL = 'SELECT * FROM publication WHERE profile_id = :profile_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['profile_id' => $profile_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
    
    }

    public function searchPublications($query) {
        $SQL = 'SELECT * FROM publication WHERE publication_title LIKE :query OR publication_text LIKE :query';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['query' => '%' . $query . '%']);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Publication');
        return $STMT->fetchAll();
    }
}