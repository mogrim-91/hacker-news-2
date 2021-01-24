<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['title'], $_POST['url'], $_POST['description'])) {
    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $url = trim(filter_var($_POST['url'], FILTER_SANITIZE_URL));
    $description = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
    $post_date = date('Y-m-d H.i');
    $user_id = $_SESSION['loggedIn']['id'];
    $author = $_SESSION['loggedIn']['username'];

    $statement = $pdo->prepare('INSERT INTO posts (title, url, description, post_date, user_id, author) VALUES (:title, :url, :description, :post_date, :user_id, :author)');
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':url', $url, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':post_date', $post_date, PDO::PARAM_STR);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':author', $author, PDO::PARAM_STR);
    $statement->execute();
}
header('Location: ../../index.php');
