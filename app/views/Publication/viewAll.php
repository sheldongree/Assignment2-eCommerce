<!-- Publication/viewAll.php -->

<!-- Search Form -->
<form action="/Publication/search" method="GET">
    <input type="text" name="query" placeholder="Search by title or content">
    <button type="submit">Search</button>
</form>

<?php
// Reverse the order of publications
$publications = array_reverse($publications);
?>

<?php foreach ($publications as $publication): ?>
    <?php if ($publication->publication_status !== 'private'): ?>
        <div>
            <h2><?php echo $publication->publication_title; ?></h2>
            <p><?php echo $publication->publication_text; ?></p>
            <?php if (isset($_SESSION['profile_id']) && $publication->profile_id === $_SESSION['profile_id']): ?>
                <!-- Edit and Delete options for the owner of the publication -->
                <a href="/Publication/modify/<?php echo $publication->publication_id; ?>">Edit</a>
                <a href="/Publication/delete/<?php echo $publication->publication_id; ?>">Delete</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endforeach; ?>