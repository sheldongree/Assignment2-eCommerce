<!DOCTYPE html>

<head>
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h2>Create Post</h2>
        <form action="/Publication/createPost" method="post">
            <div class="form-group">
                <label for="publication_title">Publication Title:</label>
                <input type="text" class="form-control" id="publication_title" name="publication_title" required>
            </div>
            <div class="form-group">
                <label for="publication_text">Publication Text:</label>
                <textarea class="form-control" id="publication_text" name="publication_text" rows="5"
                    required></textarea>
            </div>
            <div class="form-group">
                <label for="publication_status">Publication Status:</label>
                <select class="form-control" id="publication_status" name="publication_status">
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                </select>
            </div>
            <input type="submit" value="Create Publication" class="btn btn-primary">
        </form>
    </div>
</body>

</html>