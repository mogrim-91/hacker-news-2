<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (!authenticated()) {
    Header('Location:/index.php');
} ?>
<main>
    <h1>Create post</h1>
    <div class="createPostForm">
        <form action="app/posts/createpost.php" method="post">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Title" required>

            <label for="url">URL</label>
            <input type="url" name="url" id="url" placeholder="https://github.com" required>

            <label for="description">Description</label>
            <input type="text" name="description" id="description" required>
            <button type="submit">Sign up</button>
        </form>
    </div>
</main>









<?php require __DIR__ . '/views/footer.php';
