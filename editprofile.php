<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>

<?php if (!authenticated()) {
    Header('Location:/index.php');
} ?>
<?php $user = $_SESSION['loggedIn']; ?>
<main>
    <h1>Edit Profile</h1>
    <form action="app/users/editprofile.php" method="post">
        <div class="editForm">

            <?php if (isset($_SESSION['errorMessage'])) : ?>
                <strong><?php echo $_SESSION['errorMesssage']; ?></strong>
                <?php unset($_SESSION['errorMessage']); ?>
            <?php endif; ?>


            <label for="newUsername">Change username</label>
            <input type="text" name="newUsername" id="newUsername" placeholder="<?php echo $user['username']; ?>">

            <label for="newEmail">Email</label>
            <input type="email" name="newEmail" id="newEmail" placeholder="<?php echo $user['email']; ?>">

            <label for="biography">Change biography</label>
            <input type="text" name="biography" id="biography" placeholder="<?php echo $user['biography']; ?>">

            <label for="newPassword">Change Password</label>
            <input type="password" name="newPassword" id="newPassword">

            <label for="password">Confirm by entering your old password</label>
            <input type="password" name="password" id="password">


            <button type="submit">Edit profile</button>
        </div>

    </form>
</main>
