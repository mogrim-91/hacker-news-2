<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['replyCommentId'], $_POST['replyComment'])) {
    $text = trim(filter_var($_POST['replyComment'], FILTER_SANITIZE_SPECIAL_CHARS));
    $comment_id = (int)trim(filter_var($_POST['replyCommentId'], FILTER_SANITIZE_NUMBER_INT));
    $user_id = (int)$_SESSION['loggedIn']['id'];
    $author = $_SESSION['loggedIn']['username'];
    $date = date('Y-m-d H.i');

    $statement = $pdo->prepare('SELECT author FROM comments WHERE id = :id');
    $statement->bindParam(':id', $comment_id, PDO::PARAM_INT);
    $statement->execute();
    $get_comment_author = $statement->fetch(PDO::FETCH_ASSOC);
    $comment_author = $get_comment_author['author'];

    $statement = $pdo->prepare('INSERT INTO comment_replies (id, author, comment_id, comment_author, text, date) VALUES (:id, :author, :comment_id, :comment_author, :text, :date)');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':author', $author, PDO::PARAM_STR);
    $statement->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
    $statement->bindParam(':comment_author', $comment_author, PDO::PARAM_STR);
    $statement->bindParam(':text', $text, PDO::PARAM_STR);
    $statement->bindParam(':date', $date, PDO::PARAM_STR);
    $statement->execute();
}

header('Location: ../../index.php');
