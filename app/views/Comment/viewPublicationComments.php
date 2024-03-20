<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="/app/commentStyles.css">
    <title>Publication Details</title>
</head>

<body>
    <h1>
        <?php echo $publication->publication_title; ?>
    </h1>
    <p>
        <?php echo $publication->publication_text; ?>
    </p>

    <?php foreach ($comments as $comment): ?>
        <div class="comment">
            <p>
                <?php echo $comment->comment_text; ?>
            </p>
            <p>
                <?php echo $comment->timestamp; ?>
            </p>
            <?php if (isset ($_SESSION['profile_id']) && $comment->profile_id === $_SESSION['profile_id']): ?>
                <div class="comment-actions">
                    <a href="/Comment/editComment/<?php echo $comment->publication_comment_id; ?>">Edit</a>
                    <a href="/Comment/deleteComment/<?php echo $comment->publication_comment_id; ?>">Delete</a>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <?php if (isset ($_SESSION['profile_id'])): ?>
        <div class="add-comment-form">
            <form action="/Comment/addComment/<?php echo $publication->publication_id; ?>" method="post">
                <label for="comment">Add Comment:</label><br>
                <textarea id="comment" name="comment" placeholder="Enter your comment here..." required></textarea><br>
                <input type="submit" value="Submit">
            </form>
            <a href="/Publication/viewAll" class="return-button">Return</a>
        </div>
    <?php endif; ?>
</body>

</html>