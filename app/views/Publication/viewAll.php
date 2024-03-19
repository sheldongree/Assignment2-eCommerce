<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Publications</title>
    <style>
        body {
            background-color: #f8f9fa; /* Light gray */
            font-family: Arial, sans-serif; /* Default font */
        }

        form {
            margin-top: 50px;
            text-align: center;
        }

        input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da; /* Gray border */
            margin-right: 10px;
        }

        button {
            background-color: #007bff; /* Blue */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3; /* Darker blue */
        }

        a {
            color: #007bff; /* Blue */
            text-decoration: none;
        }

        a:hover {
            color: #0056b3; /* Darker blue */
        }

        div {
            background-color: #fff; /* White background */
            border: 1px solid #ced4da; /* Gray border */
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow */
        }

        h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 10px;
        }

        .edit-link {
            background-color: #007bff; /* Blue */
            border: none;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 5px;
            margin-right: 10px;
        }

        .edit-link:hover {
            background-color: #0056b3; /* Darker blue */
        }

        .delete-link {
            background-color: #dc3545; /* Red */
            border: none;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 5px;
            margin-right: 10px;
        }

        .delete-link:hover {
            background-color: #c82333; /* Darker red */
        }
    </style>
</head>

<body>
    <form action="/Publication/search" method="GET">
        <input type="text" name="query" placeholder="Search by title or content">
        <button type="submit">Search</button>
        <?php if (!isset($_SESSION['profile_id'])): ?>
            <a href='/User/login'>Log In</a>
        <?php endif; ?>
    </form>

    <?php
    $publications = array_reverse($publications);
    ?>

    <?php foreach ($publications as $publication): ?>
        <?php if ($publication->publication_status !== 'private'): ?>
            <div>
                <h2><?php echo $publication->publication_title; ?></h2>
                <p><?php echo $publication->publication_text; ?></p>
                <?php if (isset ($_SESSION['profile_id']) && $publication->profile_id === $_SESSION['profile_id']): ?>
                    <a href="/Publication/modify/<?php echo $publication->publication_id; ?>" class="edit-link">Edit</a>
                    <a href="/Publication/delete/<?php echo $publication->publication_id; ?>" class="delete-link">Delete</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</body>

</html>
