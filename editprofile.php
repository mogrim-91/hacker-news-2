<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (!authenticated()) {
    Header('Location:/index.php');
} ?>
<?php $user = $_SESSION['loggedIn']; ?>
<main>
    <div class="editProfile">
        <h1>Edit Profile</h1>

        <?php $avatar = getAvatar($pdo, $_SESSION['loggedIn']['id']); ?>
        <?php if ($avatar) : ?>
            <img src="/app/users/uploads/<?php echo $avatar['avatar']; ?>" width="100px">
        <?php else : ?>
            <img src="/app/users/uploads/default-avatar.png" width="100px">
        <?php endif; ?>
        <div class="imageUpload">
            <form action="app/users/editprofile.php" method="post" enctype="multipart/form-data">

                <label for="avatar">Choose an image for your avatar</label>
                <input type="file" name="avatar" id="avatar" accept=".png" required>

                <button class="editProfileButton" type="submit">Upload</button>
            </form>
        </div>



        <div class="editProfileForm">
            <form action="app/users/editprofile.php" method="post">


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

            </form>
        </div>

        <div class="deleteAccountContainer">
            <h3>⚠️ Danger Zone ⚠️</h3>
            <p class="deleteAccountText">Do you want to delete your account?</p>
            <br>
            <button class="deleteAccountButton" type="submit"><a href="/deleteaccount.php">Yes</a></button>
        </div>
        <br>

    </div>
</main>

<?php require __DIR__ . '/views/footer.php';
