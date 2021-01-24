<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (!authenticated()) {
    Header('Location:/index.php');
} ?>
<?php $user = $_SESSION['loggedIn']; ?>
<main>
    <h1>Edit Profile</h1>

    <form action="app/users/editprofile.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="avatar">Choose an image for your avatar</label>
            <input type="file" name="avatar" id="avatar" accept=".png" required>
        </div>
        <button type="submit">Upload</button>
    </form>




    <form action="app/users/editprofile.php" method="post">
        <div class="editForm">

            <?php if (isset($_SESSION['errorMessage'])) : ?>
                <strong><?php echo $_SESSION['errorMessage']; ?></strong>
                <?php unset($_SESSION['errorMessage']); ?>
            <?php endif; ?>


            <label for="newUsername">Change username</label>
            <input type="text" name="newUsername" id="newUsername">

            <label for="newEmail">Email</label>
            <input type="email" name="newEmail" id="newEmail">

            <label for="newBiography">Change biography</label>
            <input type="text" name="newBiography" id="newBiography">

            <label for="newPassword">Change Password</label>
            <input type="password" name="newPassword" id="newPassword">

            <label for="password">Confirm by entering your old password</label>
            <input type="password" name="password" id="password" required>


            <button type="submit">Edit profile</button>
        </div>

    </form>
</main>
