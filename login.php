<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<main>
    <div class="login">
        <h1>Login</h1>
        <?php if (isset($_SESSION['successfulSignUp'])) : ?>
            <p><?= $_SESSION['successfulSignUp']; ?></p>
            <?php unset($_SESSION['successfulSignUp']);
            ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['noUser'])) : ?>
            <p><?= $_SESSION['noUser']; ?></p>
            <?php unset($_SESSION['noUser']);
            ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['authenticated'])) : ?>
            <p><?= $_SESSION['authenticated']; ?></p>
            <?php unset($_SESSION['authenticated']); ?>
        <?php endif; ?>
        <form action="app/users/login.php" method="post">
            <div class="loginForm">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" required>

                <label for="password">Password</label>
                <input type="password" type="password" name="password" id="password" required>
                <button type="submit">Login</button>
            </div>

        </form>
        <div class="noAccount">
            <p>Don't yet have an account?</p>
            <p>Sign up with the button below</p>
            <a href="signup.php">Sign up</a>
        </div>
    </div>
</main>









<?php require __DIR__ . '/views/footer.php'; ?>
