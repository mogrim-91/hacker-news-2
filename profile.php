<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<?php if (!authenticated()) {
    Header('Location:/index.php');
} ?>
<?php $user = $_SESSION['loggedIn']; ?>
<main>
    <?php if (isset($_SESSION['message'])) : ?>
        <p><?php echo $_SESSION['message']; ?></p>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    <h1><?php echo $user['username']; ?></h1>
    <img src="/app/users/uploads/<?php echo $user['avatar']; ?>" width="100px">
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Biography: <?php echo $user['biography']; ?></p>
    <a href="/editprofile.php">Edit profile</a>







    <p><?php print_r($_SESSION['loggedIn']); ?></p>
    <p><?php print_r($_FILES); ?></p>
    <a href="createpost.php">Make a post</a>
    <a href="logout.php">Log out</a>


</main>






<?php require __DIR__ . '/views/footer.php';
