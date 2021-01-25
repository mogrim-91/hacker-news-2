<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';
// var_dump($_POST['upvote']);
if (isset($_POST['upvote'])) {
    $post_id = trim(filter_var($_POST['upvote'], FILTER_SANITIZE_STRING));
    $user_id = $_SESSION['loggedIn']['id'];
    // var_dump($post_id);
    // die(var_dump($user_id));
    $statement = $pdo->prepare('INSERT INTO upvotes (post_id, user_id) VALUES (:post_id, :user_id)');
    $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();
}

header('Location: ../../index.php');
