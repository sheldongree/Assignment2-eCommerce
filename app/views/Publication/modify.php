<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Publication</title>
    <style>
        body {
            background-color: #f8f9fa; /* Light gray */
            font-family: Arial, sans-serif; /* Default font */
        }

        .container {
            margin-top: 100px;
            max-width: 400px;
            border: 1px solid #ced4da; /* Gray border */
            border-radius: 15px;
            padding: 30px;
            background-color: #fff; /* White background */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow */
        }

        .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .container p {
            margin-bottom: 20px;
        }

        .container dl {
            margin-bottom: 20px;
        }

        .container dt {
            font-weight: bold;
        }

        .container dd {
            margin-bottom: 10px;
        }

        .form-control {
            border: 1px solid #ced4da; /* Gray border */
            border-radius: 10px;
            padding: 10px;
        }

        input[type="submit"] {
            background-color: #007bff; /* Blue */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Darker blue */
        }

        a {
            color: #007bff; /* Blue */
            text-decoration: none;
        }

        a:hover {
            color: #0056b3; /* Darker blue */
        }
    </style>
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
                <option value="public" <?php if ($publication->publication_status === 'public') echo 'selected'; ?>>Public</option>
                <option value="private" <?php if ($publication->publication_status === 'private') echo 'selected'; ?>>Private</option>
            </select><br><br>

            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>

</html>