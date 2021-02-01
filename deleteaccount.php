<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<div class="deleteAccountFinalContainer">
    <form action="/app/users/deleteaccount.php" method="post">
        <h3>⚠️ Final Warning ⚠️</h3>
        <p class="deleteAccountFinalText">By deleting your account all of your personal data will be permanently destroyed.</p>
        <p class="deleteAccountFinalText">Do you still want to continue and delete your account?</p>
        <br>
        <button class="deleteAccountFinalButton" name="deleteAccount" id="deleteAccount" type="submit">Yes</button>

    </form>
</div>

<?php require __DIR__ . '/views/footer.php';
