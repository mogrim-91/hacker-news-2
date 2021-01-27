<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (!authenticated()) {
    Header('Location:/index.php');
} ?>
<?php $user = $_SESSION['loggedIn']; ?>
<main>
    <div class="profile">
        <?php if (isset($_SESSION['message'])) : ?>
            <p><?php echo $_SESSION['message']; ?></p>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <h1><?php echo $user['username']; ?></h1>
        <?php if ($user['avatar'] === null) : ?>
            <img src="/app/users/uploads/default-avatar.png" width="100px">
        <?php else : ?>
            <img src="/app/users/uploads/<?php echo $user['avatar']; ?>" width="100px">
        <?php endif; ?>
        <p>Email: <?php echo $user['email']; ?></p>
        <p>Biography: <?php echo $user['biography']; ?></p>
        <a href="/editprofile.php">Edit profile</a>


        <a href="createpost.php">Make a post</a>
    </div>


</main>






<?php require __DIR__ . '/views/footer.php';
