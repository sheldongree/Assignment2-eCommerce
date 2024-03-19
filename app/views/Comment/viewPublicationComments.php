<!-- Display publication details -->
<h1><?php echo $publication->publication_title; ?></h1>
<p><?php echo $publication->publication_text; ?></p>

<!-- Display comments -->
<?php foreach ($comments as $comment): ?>
    <div>
        <p><?php echo $comment->comment_text; ?></p>
        <p><?php echo $comment->timestamp; ?></p>
        <?php if (isset($_SESSION['profile_id']) && $comment->profile_id === $_SESSION['profile_id']): ?>
            <!-- Edit and Delete options for the owner of the comment -->
            <a href="/Comment/editComment/<?php echo $comment->publication_comment_id; ?>">Edit</a>
            <a href="/Comment/deleteComment/<?php echo $comment->publication_comment_id; ?>">Delete</a>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<!-- Form to add a new comment -->
<?php if (isset($_SESSION['profile_id'])): ?>
    <form action="/Comment/addComment/<?php echo $publication->publication_id; ?>" method="post">
        <label for="comment">Add Comment:</label><br>
        <textarea id="comment" name="comment"></textarea><br>
        <input type="submit" value="Submit">
    </form>
<?php endif; ?>
