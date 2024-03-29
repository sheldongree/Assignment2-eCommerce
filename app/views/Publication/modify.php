<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="/app/publicationStyles.css">
    <title>Edit Publication</title>
</head>

<body>
    <div class="container">
        <h1>Edit Publication</h1>
        <form action="/Publication/modify/<?php echo $publication->publication_id; ?>" method="post">
            <label for="publication_title">Title:</label><br>
            <input type="text" id="publication_title" name="publication_title"
                value="<?php echo $publication->publication_title; ?>"><br><br>

            <label for="publication_text">Text:</label><br>
            <textarea id="publication_text"
                name="publication_text"><?php echo $publication->publication_text; ?></textarea><br><br>

            <label for="publication_status">Status:</label><br>
            <select id="publication_status" name="publication_status">
                <option value="public" <?php if ($publication->publication_status === 'public')
                    echo 'selected'; ?>>Public
                </option>
                <option value="private" <?php if ($publication->publication_status === 'private')
                    echo 'selected'; ?>>
                    Private</option>
            </select><br><br>

            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>

</html>