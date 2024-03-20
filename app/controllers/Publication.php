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
            $this->view('Publication/createPost');
        }
    }

    public function viewAll()
    {
        // Fetch all publications from the database
        $publicationModel = new \app\models\Publication();
        $publications = $publicationModel->getAllPublications();

        // Fetch comments for each publication
        foreach ($publications as $publication) {
            $comments = $publicationModel->getPublicationComments($publication->publication_id);
            $publication->comments = $comments;
        }

        // Pass publications data to the view
        $data = ['publications' => $publications];
        $this->view('Publication/viewAll', $data);
    }
    public function modify($publication_id)
    {
        $publicationModel = new \app\models\Publication();
        $publication = $publicationModel->getById($publication_id);

        if (!$publication || $publication->profile_id !== $_SESSION['profile_id']) {
            header('Location: /');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $publication->publication_title = $_POST['publication_title'];
            $publication->publication_text = $_POST['publication_text'];
            $publication->publication_status = $_POST['publication_status'];
            $publicationModel->update($publication);

            header('Location: /Publication/viewAll');
            exit;
        } else {
            $data = ['publication' => $publication];
            $this->view('Publication/modify', $data);
        }
    }

    public function delete($publication_id)
    {
        $publicationModel = new \app\models\Publication();
        $publication = $publicationModel->getById($publication_id);

        if (!$publication || $publication->profile_id !== $_SESSION['profile_id']) {
            header('Location: /Publication/viewAll');
            exit;
        }

        $publicationModel->delete($publication_id);

        header('Location: /Publication/viewAll');
    }

    // User personal posts where they can see private or public posts

    #[\app\filters\Login]
    public function personalPublication()
    {

        $publicationModel = new \app\models\Publication();
        $publications = $publicationModel->getByProfileId($_SESSION['profile_id']);

        $data = ['publications' => $publications];
        $this->view('Publication/personalPublication', $data);
    }

    public function personalDelete($publication_id)
    {
        $publicationModel = new \app\models\Publication();
        $publication = $publicationModel->getById($publication_id);

        if (!$publication || $publication->profile_id !== $_SESSION['profile_id']) {
            header('Location: /Publication/viewAll');
            exit;
        }
        $publicationModel->delete($publication_id);

        header('Location: /Publication/personalPublication');
    }

    // Method to search by title or content
    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset ($_GET['query'])) {
            $query = $_GET['query'];

            $publicationModel = new \app\models\Publication();
            $publications = $publicationModel->searchPublications($query);

            $data = ['publications' => $publications];
            $this->view('Publication/viewAll', $data);
        } else {
            header('Location: /Publication/viewAll');
        }
    }
}