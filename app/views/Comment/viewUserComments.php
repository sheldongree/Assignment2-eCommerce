<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Comments</title>
    <style>
        body {
            background-color: #f8f9fa; /* Light gray */
            font-family: Arial, sans-serif; /* Default font */
            padding: 20px;
        }

        h1 {
            color: #007bff; /* Blue */
            text-align: center;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #fff; /* White */
            border: 1px solid #ced4da; /* Gray border */
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Shadow */
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .comment-meta {
            font-size: 14px;
            color: #6c757d; /* Gray */
        }

        .comment-actions {
            margin-left: auto;
        }

        p {
            margin: 10px 0;
        }

        a {
            color: #007bff; /* Blue */
            text-decoration: none;
            margin-left: 10px;
        }

        a:hover {
            color: #0056b3; /* Darker blue */
        }
    </style>
</head>

<body>
    <h1>Your Comments</h1>
    <?php if (empty($comments)): ?>
        <p>No comments found.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($comments as $comment): ?>
                <li>
                    <div class="comment-header">
                        <div class="comment-meta">
                            <p>Publication ID: <?php echo $comment->publication_id; ?></p>
                        </div>
                        <div class="comment-actions">
                            <a href="/Comment/editComment/<?php echo $comment->publication_comment_id; ?>">Edit</a>
                            <a href="/Comment/deleteComment/<?php echo $comment->publication_comment_id; ?>">Delete</a>
                        </div>
                    </div>
                    <p>Comment Text: <?php echo $comment->comment_text; ?></p>
                    <p><?php echo $comment->timestamp; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>

</html>

