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

    public function modify($publication_id) {
        $publicationModel = new \app\models\Publication();
        $publication = $publicationModel->getById($publication_id);
    
        if (!$publication || $publication->profile_id !== $_SESSION['profile_id']) {
            // Handle unauthorized access or publication not found
            header('Location: /');
            exit;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process form submission for editing publication
            $publication->publication_title = $_POST['publication_title'];
            $publication->publication_text = $_POST['publication_text'];
            $publication->publication_status = $_POST['publication_status'];
            $publicationModel->update($publication);
    
            // Redirect back to viewPublication page
            header('Location: /Publication/viewAll');
            exit;
        } else {
            // Render the form for editing publication
            $data = ['publication' => $publication];
            $this->view('Publication/modify', $data);
        }
    }

    public function delete($publication_id){
        $publicationModel = new \app\models\Publication();
        $publication = $publicationModel->getById($publication_id);
    
        if (!$publication || $publication->profile_id !== $_SESSION['profile_id']) {
            // Handle unauthorized access or publication not found
            header('Location: /Publication/viewAll');
            exit;
        }
    
        // // Delete associated comments first
        // $commentModel = new \app\models\Comment();
        // $commentModel->deleteCommentsForPublication($publication_id);
    
        // Then delete the publication
        $publicationModel->delete($publication_id);
    
        header('Location: /Publication/viewAll'); // Redirect to homepage after deletion
    }
    
    public function personalPublication() {
        if (!isset($_SESSION['profile_id'])) {
            header('Location: /User/login');
            exit;
        }
    
        $publicationModel = new \app\models\Publication();
        $publications = $publicationModel->getByProfileId($_SESSION['profile_id']);
    
        $data = ['publications' => $publications];
        $this->view('Publication/personalPublication', $data);
    }

    public function personalDelete($publication_id){
        $publicationModel = new \app\models\Publication();
        $publication = $publicationModel->getById($publication_id);
    
        if (!$publication || $publication->profile_id !== $_SESSION['profile_id']) {
            // Handle unauthorized access or publication not found
            header('Location: /Publication/viewAll');
            exit;
        }
    
        // // Delete associated comments first
        // $commentModel = new \app\models\Comment();
        // $commentModel->deleteCommentsForPublication($publication_id);
    
        // Then delete the publication
        $publicationModel->delete($publication_id);
    
        header('Location: /Publication/personalPublication'); // Redirect to homepage after deletion
    }

    public function search() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
            $query = $_GET['query'];
    
            // Perform the search in the model
            $publicationModel = new \app\models\Publication();
            $publications = $publicationModel->searchPublications($query);
    
            // Pass the search results to the view
            $data = ['publications' => $publications];
            $this->view('Publication/viewAll', $data);
        } else {
            // Handle invalid or empty search queries
            header('Location: /Publication/viewAll');
        }
    }
}