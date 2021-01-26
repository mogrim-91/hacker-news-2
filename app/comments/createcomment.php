<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// var_dump($post['id']);
var_dump($_POST['comment']);
var_dump($_POST['commentPostId']);

if (isset($_POST['comment'], $_POST['commentPostId'])) {

    $text = trim(filter_var($_POST['comment'], FILTER_SANITIZE_STRING));
    $post_id = trim(filter_var($_POST['commentPostId'], FILTER_SANITIZE_STRING));
    $user_id = $_SESSION['loggedIn']['id'];
    $author = $_SESSION['loggedIn']['username'];
    $date = date('Y-m-d H.i');

    $statement = $pdo->prepare('INSERT INTO comments (post_id, user_id, author, text, date) VALUES (:post_id, :user_id, :author, :text, :date)');
    $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':author', $author, PDO::PARAM_STR);
    $statement->bindParam(':text', $text, PDO::PARAM_STR);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->execute();
}

header('Location: ../../index.php');
