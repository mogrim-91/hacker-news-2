<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';
if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $username = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash(filter_var($_POST['password'], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);



    $statement = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    $statement->execute();

    $_SESSION['successfulSignUp'] = "You've successfully signed up, please login!";
}

header('Location: ../../login.php');
