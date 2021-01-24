<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$user = $_SESSION['loggedIn'];
$password = password_hash(trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING)), PASSWORD_DEFAULT);
if (!password_verify($password, $user['password'])) {
    $_SESSION['errorMessage'] = "Wrong password!";
    header('Location: ../../editprofile.php');
}

if (isset($_POST['newUsername'])) {
    $username = trim(filter_var($_POST['newUsername'], FILTER_SANITIZE_STRING));

    if ($username != $user['username']) {
        $statement = $pdo->prepare('UPDATE users SET username = :username WHERE id = :id');
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->bindParam(':id', $user['id'], PDO::PARAM_INT);
        $statement->execute();
        $_SESSION['loggedIn']['username'] = $username;
    }
}

if (isset($_POST['newEmail'])) {
    $email = trim(filter_var($_POST['newEmail'], FILTER_SANITIZE_EMAIL));

    if ($email != $user['email']) {
        $statement = $pdo->prepare('UPDATE users SET email = :email WHERE id = :id');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':id', $user['id'], PDO::PARAM_INT);
        $statement->execute();
        $_SESSION['loggedIn']['email'] = $email;
    }
}

if (isset($_POST['newBiography'])) {
    $biography = trim(filter_var($_POST['newBiography'], FILTER_SANITIZE_STRING));

    if ($biography != $user['biography']) {
        $statement = $pdo->prepare('UPDATE users SET biography = :biography WHERE id = :id');
        $statement->bindParam(':biography', $biography, PDO::PARAM_STR);
        $statement->bindParam(':id', $user['id'], PDO::PARAM_INT);
        $statement->execute();
        $_SESSION['loggedIn']['biography'] = $biography;
    }
}
// Changing password
if (isset($_POST['newPassword'])) {
    $password = password_hash(trim(filter_var($_POST['newPassword'], FILTER_SANITIZE_STRING)), PASSWORD_DEFAULT);

    if ($password != $user['password']) {
        $statement = $pdo->prepare('UPDATE users SET password = :password WHERE id = :id');
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->bindParam(':id', $user['id'], PDO::PARAM_INT);
        $statement->execute();
        $_SESSION['loggedIn']['password'] = $password;
    }
}

$_SESSION['message'] = "You've successfully updated your profile!";

header('Location: ../../profile.php');
