<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (!authenticated()) {
    Header('Location:/index.php');
} ?>

<main>
    <h1>Edit Comment</h1>
    <form action="app/comments/editcomment.php" method="post">
        <div class="editCommentForm">
            <label for="editText">Edit text</label>
            <input type="text" name="editText" id="editText">
            <button type="submit">Edit comment</button>
        </div>

    </form>
</main>


<?php require __DIR__ . '/views/footer.php';
