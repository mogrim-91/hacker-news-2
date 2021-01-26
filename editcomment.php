<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (!authenticated()) {
    Header('Location:/index.php');
} ?>

<main>
    <h1>Edit Comment</h1>
    <div class="editCommentForm">
        <form action="app/comments/editcomment.php" method="post">

            <label for="editText">Edit text</label>
            <input type="text" name="editText" id="editText">
            <button type="submit" name="editCommentId" id="editCommentId" value="<?php echo $_POST['editCommentId']; ?>">Edit comment</button>


        </form>
    </div>
</main>


<?php require __DIR__ . '/views/footer.php';
