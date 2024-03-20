<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="/app/publicationStyles.css">
    <title>Your Publications</title>
</head>

<body>
    <h1>Your Publications</h1>
    <?php if (empty ($publications)): ?>
        <p>No publications found.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($publications as $publication): ?>
                <li>
                    <h2>
                        <?php echo $publication->publication_title; ?>
                    </h2>
                    <p>
                        <?php echo $publication->publication_text; ?>
                    </p>
                    <a href="/Publication/modify/<?php echo $publication->publication_id; ?>">Edit</a>
                    <a href="/Publication/personalDelete/<?php echo $publication->publication_id; ?>">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>

</html>