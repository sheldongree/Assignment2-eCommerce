<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Publications</title>
<style>
    body {
        background-color: black;
        color: white;
        font-family: Arial, sans-serif;
    }
    form {
        margin-bottom: 20px;
    }
    input[type="text"] {
        padding: 8px;
        border: none;
        border-radius: 4px;
    }
    button {
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }
    button:hover {
        background-color: #45a049;
    }
    a {
        color: white;
        text-decoration: none;
        margin-left: 10px;
    }
    div {
        margin-bottom: 20px;
        padding: 20px;
        background-color: #333;
        border-radius: 8px;
    }
    h2 {
        margin-top: 0;
    }
    p {
        margin-bottom: 0;
    }
    a.edit, a.delete {
        margin-left: 10px;
        color: green;
        text-decoration: none;
    }
</style>
</head>
<body>
<form action="/Publication/search" method="GET">
    <input type="text" name="query" placeholder="Search by title or content">
    <button type="submit">Search</button>
    <a href='/User/login'>Log In</a>
</form>

<?php
$publications = array_reverse($publications);
?>

<?php foreach ($publications as $publication): ?>
    <?php if ($publication->publication_status !== 'private'): ?>
        <div>
            <h2>
                <?php echo $publication->publication_title; ?>
            </h2>
            <p>
                <?php echo $publication->publication_text; ?>
            </p>
            <?php if (isset ($_SESSION['profile_id']) && $publication->profile_id === $_SESSION['profile_id']): ?>
                <a class="edit" href="/Publication/modify/<?php echo $publication->publication_id; ?>">Edit</a>
                <a class="delete" href="/Publication/delete/<?php echo $publication->publication_id; ?>">Delete</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endforeach; ?>

</body>
</html>
