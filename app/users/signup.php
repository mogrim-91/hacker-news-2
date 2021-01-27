<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash(filter_var($_POST['password'], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);

    if (checkIfUsernameIsTaken($pdo, $username) || checkIfEmailIsTaken($pdo, $email)) {
        if (checkIfUsernameIsTaken($pdo, $username)) {
            $_SESSION['errorUsername'] = "That username is already taken!";
        }
        if (checkIfEmailIsTaken($pdo, $email)) {
            $_SESSION['errorEmail'] = "That email is alread in use by another user!";
        }
        header('Location: ../../signup.php');
    } else {
        $statement = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->execute();

        $_SESSION['successfulSignUp'] = "You've successfully signed up, please login!";

        header('Location: ../../login.php');
    }
}
