<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (!authenticated()) {
    Header('Location:/index.php');
} ?>
<main>
    <h1>Sign up</h1>
    <form action="app/posts/createpost.php" method="post">
        <div class="createPostForm">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Title" required>

            <label for="url">URL</label>
            <input type="url" name="url" id="url" placeholder="https://github.com" required>

            <label for="description">Description</label>
            <input type="text" name="description" id="description" required>
            <button type="submit">Sign up</button>
        </div>

    </form>
</main>









<?php require __DIR__ . '/views/footer.php';
