<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>

<main>
    <h1>Sign up</h1>
    <form action="app/users/signup.php" method="post">
        <div class="signupForm">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Guy@threepwood.lol" required>

            <label for="password">Password</label>
            <input type="password" type="password" name="password" id="password" required>
            <button type="submit">Sign up</button>
        </div>

    </form>
</main>









<?php require __DIR__ . '/views/footer.php';
