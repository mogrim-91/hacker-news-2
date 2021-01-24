<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['username'], $_POST['password'])) {
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

    $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $_SESSION['noUser'] = "Couldn't find any user with that username";
        header('Location: ../../login.php');
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['authenticated'] = "Successfully logged in!";
        $_SESSION['loggedIn'] = $user;
        // header('Location: ../../login.php');
    }
}
header('Location: ../../login.php');
