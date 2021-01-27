<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<main>
    <?php if (isset($_SESSION['errorUsername'])) : ?>
        <strong><?php echo $_SESSION['errorUsername']; ?></strong>
        <?php unset($_SESSION['errorUsername']); ?></strong>
    <?php endif; ?>
    <?php if (isset($_SESSION['errorEmail'])) : ?>
        <strong><?php echo $_SESSION['errorEmail']; ?></strong>
        <?php unset($_SESSION['errorEmail']); ?></strong>
    <?php endif; ?>
    <div class="signupForm">
        <h1>Sign up</h1>
        <form action="app/users/signup.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email@mail.com" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Sign up</button>
        </form>
    </div>
</main>









<?php require __DIR__ . '/views/footer.php';
