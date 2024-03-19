<?php
namespace app\controllers;

use app\models\PublicationComment;

class Comment extends \app\core\Controller {
    public $publication_comment_id;
    public $profile_id;
    public $publication_id;
    public $comment_text;
    public $timestamp;

    // Method to add a comment
    public function addComment($publication_id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if the user is logged in
            if (!isset($_SESSION['profile_id'])) {
                // Redirect to login page if not logged in
                header('Location: /User/login');
                exit;
            }

            // Create a new instance of the PublicationComment model
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
    

    public function editComment($publication_comment_id) {
        // Retrieve the comment to be edited
        $commentModel = new \app\models\PublicationComment();
        $comment = $commentModel->get($publication_comment_id);
    
        // Check if the comment exists and belongs to the current user
        if (!$comment || $comment->profile_id !== $_SESSION['profile_id']) {
            // Handle unauthorized access or comment not found
            header('Location: /Comment/viewPublicationComments'); // Redirect to homepage or appropriate error page
            exit;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Update the comment content with the submitted data
            $comment_text = $_POST['comment'];
    
            // Save the updated comment
            $commentModel->update($publication_comment_id, $comment_text);
    
            // Redirect back to viewPublicationComments page
            header('Location: /Publication/viewPublicationComments/' . $comment->publication_id);
            exit;
        } else {
            // Render the form for editing the comment
            $data = ['comment' => $comment];
            $this->view('Comment/editComment', $data); // Assuming the view file is named 'editComment.php'
        }
    }       
      

    // Delete a comment
    public function deleteComment($publication_comment_id) {
        $commentModel = new PublicationComment();
        $comment = $commentModel->get($publication_comment_id);
        
        // Check if the comment exists and the logged-in user is the owner
        if ($comment && $comment->profile_id === $_SESSION['profile_id']) {
            $commentModel->delete($publication_comment_id);
        }
        // Redirect back to the previous page after deleting comment
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    

    // Retrieve comments for a specific publication
    public function getComments($publication_id) {
        $comment = new PublicationComment();
        return $comment->getAll($publication_id);
    }

    public function viewPublicationComments($publication_id) {
        // Retrieve the publication details
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

    // Comment controller

public function viewUserComments() {
    // Check if the user is logged in
    if (!isset($_SESSION['profile_id'])) {
        header('Location: /User/login');
        exit;
    }

    // Retrieve all comments made by the logged-in user
    $commentModel = new \app\models\PublicationComment();
    $comments = $commentModel->getAllByProfileId($_SESSION['profile_id']);

    // Pass the comments data to the view
    $data = ['comments' => $comments];
    $this->view('Comment/viewUserComments', $data);
}

    
}