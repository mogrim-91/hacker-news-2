<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';
// var_dump($_POST['editText']);
// die(var_dump($_POST['editCommentId']));
if (isset($_POST['editText'], $_POST['editCommentId'])) {
    $text = trim(filter_var($_POST['editText'], FILTER_SANITIZE_STRING));
    // $editUrl = trim(filter_var($_POST['url'], FILTER_SANITIZE_URL));
    // $editDescription = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
    $id = trim(filter_var($_POST['editCommentId'], FILTER_SANITIZE_STRING));
    // $post_date = date('Y-m-d H.i');
    // $user_id = $_SESSION['loggedIn']['id'];
    // $author = $_SESSION['loggedIn']['username'];

    $statement = $pdo->prepare('UPDATE comments SET text = :text WHERE id = :id');
    $statement->bindParam(':text', $text, PDO::PARAM_STR);
    // $statement->bindParam(':url', $url, PDO::PARAM_STR);
    // $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    // $statement->bindParam(':post_date', $post_date, PDO::PARAM_STR);
    // $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    // $statement->bindParam(':author', $author, PDO::PARAM_STR);
    $statement->execute();
}
header('Location: ../../index.php');
