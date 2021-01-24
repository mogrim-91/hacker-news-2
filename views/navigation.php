<?php if (!authenticated()) : ?>
    <a href="/login.php">Login</a>
<?php endif; ?>
<?php if (authenticated()) : ?>
    <a href="/profile.php">Profile</a>
<?php endif; ?>
