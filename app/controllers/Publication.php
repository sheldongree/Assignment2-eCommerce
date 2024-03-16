<?php
namespace app\controllers;

class Publication extends \app\core\Controller{
	
    public function publishPost(){

        var_dump($_SESSION['profile_id']);


        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $publication = new \app\models\Publication();
            $publication->profile_id = $_SESSION['profile_id'];
            $publication->publication_title = $_POST['publication_title'];
            $publication->publication_text = $_POST['publication_text'];
            $publication->timestamp = date('Y-m-d H:i:s');
            $publication->publication_status = 1; // Assuming it's always published
            //insert it
            $publication->insert();
            //redirect
            header('location:/Publication/createPost');
        }else{
            $this->view('Profile/create');
        }
    }
}