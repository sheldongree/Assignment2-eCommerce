<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/app/publicationStyles.css">
    <title>Search Publications</title>
</head>

<body>
    <form action="/Publication/search" method="GET">
        <input type="text" name="query" placeholder="Search by title or content">
        <button type="submit">Search</button>
    </form>

    <?php
    $publications = array_reverse($publications);
    ?>

    <?php foreach ($publications as $publication): ?>
        <?php if ($publication->publication_status !== 'private'): ?>
            <div>
                <h2><a href="/Publication/viewPublicationComments/<?php echo $publication->publication_id; ?>">
                        <?php echo $publication->publication_title; ?>
                    </a></h2>
                <p>
                    <?php echo $publication->publication_text; ?>
                </p>
                <?php if (!empty ($publication->comments)): ?>
                    <h3>Comments:</h3>
                    <ul>
                        <?php foreach ($publication->comments as $comment): ?>
                            <li>
                                <?php echo $comment->comment_text; ?>
                                <br>
                                <small>
                                    <?php echo $comment->timestamp; ?>
                                </small>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No comments yet.</p>
                <?php endif; ?>
                <?php if (isset ($_SESSION['profile_id']) && $publication->profile_id === $_SESSION['profile_id']): ?>
                    <a href="/Publication/modify/<?php echo $publication->publication_id; ?>" class="edit-link">Edit</a>
                    <a href="/Publication/delete/<?php echo $publication->publication_id; ?>" class="delete-link">Delete</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php if (!isset ($_SESSION['profile_id'])): ?>
        <a href='/User/login' class="profile-button">Log In</a>
    <?php endif; ?>
    <?php if (isset ($_SESSION['profile_id'])): ?>
        <a href='/User/securePlace' class="profile-button">My Profile</a>
    <?php endif; ?>
</body>

</html>