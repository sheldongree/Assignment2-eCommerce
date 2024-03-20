<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="/app/commentStyles.css">
    <title>Your Comments</title>
</head>

<body>
    <h1>Your Comments</h1>
    <?php if (empty ($comments)): ?>
        <p>No comments found.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($comments as $comment): ?>
                <li>
                    <div class="comment-header">
                        <div class="comment-meta">
                            <p>Publication ID:
                                <?php echo $comment->publication_id; ?>
                            </p>
                        </div>
                        <div class="comment-actions">
                            <a href="/Comment/editComment/<?php echo $comment->publication_comment_id; ?>">Edit</a>
                            <a href="/Comment/deleteComment/<?php echo $comment->publication_comment_id; ?>">Delete</a>
                        </div>
                    </div>
                    <p>Comment Text:
                        <?php echo $comment->comment_text; ?>
                    </p>
                    <p>
                        <?php echo $comment->timestamp; ?>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>

</html>