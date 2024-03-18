<!-- viewPublication.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Publication</title>
</head>
<body>
    <h1>Publication Details</h1>
    <p>Publication Title: <?php echo $publication->publication_title; ?></p>
    <p>Publication Text: <?php echo $publication->publication_text; ?></p>
    <p>Publication Status: <?php echo $publication->publication_status; ?></p>

    <h2>Comments</h2>
    <?php if (!empty($comments)): ?>
        <?php foreach ($comments as $comment): ?>
            <div>
                <p>Profile ID: <?php echo $comment->profile_id; ?></p>
                <p>Timestamp: <?php echo $comment->timestamp; ?></p>
                <p>Comment Text: <?php echo $comment->comment_text; ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No comments available.</p>
    <?php endif; ?>

    <!-- Allow commenting if publication is public or belongs to the logged-in user -->
    <?php if ($_SESSION['profile_id'] === $publication->profile_id || $publication->publication_status === 'public'): ?>
    <h2>Add a Comment</h2>
    <form action="/Publication/addComment/<?php echo $publication->publication_id; ?>" method="POST">
        <label for="comment_text">Comment:</label><br>
        <textarea id="comment_text" name="comment_text" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Add Comment">
    </form>
    <?php endif; ?>

    <!-- Allow editing if publication belongs to the logged-in user -->
    <?php if ($_SESSION['profile_id'] === $publication->profile_id): ?>
    <h2>Edit Publication</h2>
    <!-- Render the form for editing publication -->
    <form action="/Publication/editPublication/<?php echo $publication->publication_id; ?>" method="POST">
        <label for="publication_title">Title:</label><br>
        <input type="text" id="publication_title" name="publication_title" value="<?php echo $publication->publication_title; ?>"><br>
        <label for="publication_text">Text:</label><br>
        <textarea id="publication_text" name="publication_text" rows="4" cols="50"><?php echo $publication->publication_text; ?></textarea><br>
        <label for="publication_status">Status:</label><br>
        <select id="publication_status" name="publication_status">
            <option value="public" <?php if($publication->publication_status === 'public') echo 'selected'; ?>>Public</option>
            <option value="private" <?php if($publication->publication_status === 'private') echo 'selected'; ?>>Private</option>
        </select><br>
        <input type="submit" value="Save Changes">
    </form>
    <?php endif; ?>
</body>
</html>