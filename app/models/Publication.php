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
        $SQL = 'INSERT INTO publication (publication_id, profile_id, publication_title, publication_text, timestamp, publication_status) VALUES (:publication_id, :profile_id, :publication_title, :publication_text, :timestamp, :publication_status)';
        //prepare the statement
        $STMT = self::$_conn->prepare($SQL);
        //execute
        //(:publication_id, :profile_id, :publication_title, :publication_text, :timestamp, :publiation_status)';
        $data = [
            'publication_id' => $this->publication_id,
            'profile_id' => $this->profile_id,
            'publication_title' => $this->publication_title,
            'publication_text' => $this->publication_text,
            'timestamp' => $this->timestamp,
            'publication_status' => $this->publication_status,
        ];
        $STMT->execute($data);
    }
}