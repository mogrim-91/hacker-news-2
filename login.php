<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>

<main>
    <h1>Login</h1>
    <?php if (isset($_SESSION['successfulSignUp'])) : ?>
        <p><?= $_SESSION['successfulSignUp']; ?></p>
    <?php endif; ?>
    <form action="app/users/login.php">
        <div class="loginForm">
            <label for="email">Email</label>
            <input type="email" type="email" name="email" id="email" placeholder="guy@threepwood.com">

            <label for="password">Password</label>
            <input type="password" type="password" name="password" id="password">
            <button type="submit">Login</button>
        </div>
        <div>
            <p>Don't yet have an account? Sign up with the button below</p>
            <a href="signup.php">Sign up</a>
        </div>
    </form>
</main>









<?php require __DIR__ . '/views/footer.php'; ?>
