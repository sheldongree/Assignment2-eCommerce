<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Publications</title>
    <style>
        body {
            background-color: #f8f9fa; /* Light gray */
            font-family: Arial, sans-serif; /* Default font */
        }

        h1 {
            margin-top: 50px;
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
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

        a {
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

        a:hover {
            background-color: #0056b3; /* Darker blue */
        }
    </style>
</head>

<body>
    <h1>Your Publications</h1>
    <?php if (empty($publications)): ?>
        <p>No publications found.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($publications as $publication): ?>
                <li>
                    <h2><?php echo $publication->publication_title; ?></h2>
                    <p><?php echo $publication->publication_text; ?></p>
                    <a href="/Publication/modify/<?php echo $publication->publication_id; ?>">Edit</a>
                    <a href="/Publication/personalDelete/<?php echo $publication->publication_id; ?>">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>

</html>