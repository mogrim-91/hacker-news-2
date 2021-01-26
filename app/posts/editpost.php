<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';
// var_dump($_POST['editTitle']);
// var_dump($_POST['editUrl']);
// var_dump($_POST['editDescription']);
// die(var_dump($_POST['editPostId']));
if (isset($_POST['editTitle'], $_POST['editUrl'], $_POST['editDescription'], $_POST['editPostId'])) {
    $title = trim(filter_var($_POST['editTitle'], FILTER_SANITIZE_STRING));
    $url = trim(filter_var($_POST['editUrl'], FILTER_SANITIZE_URL));
    $description = trim(filter_var($_POST['editDescription'], FILTER_SANITIZE_STRING));
    $id = trim(filter_var($_POST['editPostId'], FILTER_SANITIZE_STRING));
    // $post_date = date('Y-m-d H.i');
    // $user_id = $_SESSION['loggedIn']['id'];
    // $author = $_SESSION['loggedIn']['username'];

    $statement = $pdo->prepare('UPDATE posts SET title = :title, url = :url, description = :description WHERE id = :id ');
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':url', $url, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    // $statement->bindParam(':post_date', $post_date, PDO::PARAM_STR);
    // $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    // $statement->bindParam(':author', $author, PDO::PARAM_STR);
    $statement->execute();
}
header('Location: ../../index.php');
