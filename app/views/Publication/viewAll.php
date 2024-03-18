<?php foreach ($publications as $publication): ?>
    <div>
        <h2><?php echo $publication->publication_title; ?></h2>
        <p><?php echo $publication->publication_text; ?></p>
        <?php if (isset($_SESSION['profile_id']) && $publication->profile_id === $_SESSION['profile_id']): ?>
            <!-- Edit and Delete options for the owner of the publication -->
            <a href="/Publication/modify/<?php echo $publication->publication_id; ?>">Edit</a>
            <a href="/Publication/delete/<?php echo $publication->publication_id; ?>">Delete</a>
        <?php endif; ?>
    </div>
<?php endforeach; ?>