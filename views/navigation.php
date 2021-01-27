<div class="navigation">
    <?php if (!authenticated()) : ?>
        <a class="navItem" href="/login.php">Login</a>
    <?php endif; ?>
    <?php if (authenticated()) : ?>
        <a class="navItem" href="/profile.php">Profile</a>
        <a class="navItem" href="logout.php">Log out</a>
    <?php endif; ?>
</div>
