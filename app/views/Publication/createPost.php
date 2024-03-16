<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2>Create Post</h2>
        <form method="post" action=''>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="publication_title" name="title" required>
            </div>
            <div class="form-group">
                <label for="text">Text:</label>
                <textarea class="form-control" id="publication_text" name="text" rows="5" required></textarea>
            </div>
            <input type="submit" name="action" value="Publish">
        </form>
    </div>
</body>
</html>