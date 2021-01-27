<div class="navigation">
    <?php if (!authenticated()) : ?>
        <a class="navItem" href="/login.php">Login</a>
    <?php endif; ?>
    <?php if (authenticated()) : ?>
        <a class="navItem" href="/profile.php">Profile</a>
    <?php endif; ?>
</div>
