<?php
namespace app\controllers;

use app\models\PublicationComment;

class Comment extends \app\core\Controller
{
    public $publication_comment_id;
    public $profile_id;
    public $publication_id;
    public $comment_text;
    public $timestamp;

    #[\app\filters\Login]
    public function addComment($publication_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $commentModel = new PublicationComment();

            // Set the attributes of the comment
            $commentModel->publication_id = $publication_id;
            $commentModel->profile_id = $_SESSION['profile_id'];
            $commentModel->comment_text = $_POST['comment'];
            $commentModel->timestamp = date('Y-m-d H:i:s');

            // Insert the comment into the database
            $commentModel->insert();

            // Redirect back to the viewPublicationComments page after adding the comment
            header("Location: /Publication/viewPublicationComments/{$publication_id}");
            exit;
        }
    }


    public function editComment($publication_comment_id)
    {
        $commentModel = new \app\models\PublicationComment();
        $comment = $commentModel->get($publication_comment_id);

        // Check if the comment exists and belongs to the current user
        if (!$comment || $comment->profile_id !== $_SESSION['profile_id']) {
            header('Location: /Comment/viewPublicationComments');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $comment_text = $_POST['comment'];

            // Save the updated comment
            $commentModel->update($publication_comment_id, $comment_text);

            header('Location: /Publication/viewPublicationComments/' . $comment->publication_id);
            exit;
        } else {
            $data = ['comment' => $comment];
            $this->view('Comment/editComment', $data);
        }
    }


    public function deleteComment($publication_comment_id)
    {
        $commentModel = new PublicationComment();
        $comment = $commentModel->get($publication_comment_id);

        // Check if the comment exists and the logged-in user is the owner
        if ($comment && $comment->profile_id === $_SESSION['profile_id']) {
            $commentModel->delete($publication_comment_id);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }


    public function getComments($publication_id)
    {
        $comment = new PublicationComment();
        return $comment->getAll($publication_id);
    }

    public function viewPublicationComments($publication_id)
    {
        $publicationModel = new \app\models\Publication();
        $publication = $publicationModel->getById($publication_id);

        // Retrieve all comments for the publication
        $commentModel = new \app\models\PublicationComment();
        $comments = $commentModel->getAllByPublicationId($publication_id);

        // Pass the publication and comments data to the view
        $data = [
            'publication' => $publication,
            'comments' => $comments
        ];
        $this->view('Comment/viewPublicationComments', $data);
    }

    #[\app\filters\Login]
    public function viewUserComments()
    {

        // Retrieve all comments made by the logged-in user
        $commentModel = new \app\models\PublicationComment();
        $comments = $commentModel->getAllByProfileId($_SESSION['profile_id']);

        // Pass the comments data to the view
        $data = ['comments' => $comments];
        $this->view('Comment/viewUserComments', $data);
    }


}