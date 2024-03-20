<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="/app/commentStyles.css">
    <title>Edit Comment</title>
</head>

<body>
    <h1>Edit Comment</h1>

    <form action="/Comment/editComment/<?php echo $comment->publication_comment_id; ?>" method="post">
        <label for="comment">Edit Comment:</label><br>
        <textarea id="comment" name="comment"><?php echo $comment->comment_text; ?></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>