<?php
namespace app\controllers;

class Publication extends \app\core\Controller
{

    public function publishPost()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $publication = new \app\models\Publication();
            if (isset ($_SESSION['profile_id'])) {
                $publication->profile_id = $_SESSION['profile_id'];
                $publication->publication_title = $_POST['publication_title'];
                $publication->publication_text = $_POST['publication_text'];
                $publication->publication_status = $_POST['publication_status'];
                $publication->insert();

                header('location:/Publication/viewAll');
            } 
        } else {
            // Render the form for creating a new publication
            $this->view('Publication/createPost');
        }
    }

    public function index($publication_id){
        $publication = new \app\models\Publication();
        $publication = $publication->getById($publication_id);

        if (!$publication) {
            header('Location: /'); // Redirect to homepage or appropriate error page
            exit;
        }

        // $commentModel = new \app\models\PublicationComment();
        // $comments = $commentModel->getCommentsForPublication($publication_id);

        $data = [
            'publication' => $publication,
            // 'comments' => $comments,
            //'publication_id' => $publication_id, // Pass the publication_id to the view
        ];

        $this->view('Publication/index', $data); // Provide the view file name as an argument
    }

    public function viewAll() {
        // Fetch all publications from the database
        $publicationModel = new \app\models\Publication();
        $publications = $publicationModel->getAllPublications(); // Define this method in your Publication model
    
        // Pass publications data to the view
        $data = ['publications' => $publications];
        $this->view('Publication/viewAll', $data);
    }
    
}