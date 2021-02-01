<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['deleteAccount'])) {
    $id = trim(filter_var($_POST['deleteAccount'], FILTER_SANITIZE_STRING));
    $userId = $_SESSION['loggedIn']['id'];
    $username = $_SESSION['loggedIn']['username'];

    if ($userId !== $_SESSION['loggedIn']['id']) {
        header('Location: ../../../../index.php');
        exit();
    }

    $statement = $pdo->prepare('DELETE FROM comment_replies WHERE author = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    $statement = $pdo->prepare('DELETE FROM comments WHERE user_id = :id');
    $statement->bindParam(':id', $userId, PDO::PARAM_INT);
    $statement->execute();

    $statement = $pdo->prepare('DELETE FROM posts WHERE user_id = :id');
    $statement->bindParam(':id', $userId, PDO::PARAM_INT);
    $statement->execute();

    $statement = $pdo->prepare('DELETE FROM upvotes WHERE user_id = :id');
    $statement->bindParam(':id', $userId, PDO::PARAM_INT);
    $statement->execute();

    $statement = $pdo->prepare('DELETE FROM users WHERE id = :id');
    $statement->bindParam(':id', $userId, PDO::PARAM_INT);
    $statement->execute();
}

session_unset();
session_destroy();
header('Location: ../../../../deletionconfirmed.php');
exit();
