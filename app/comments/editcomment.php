<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['editText'], $_POST['editCommentId'])) {
    $text = trim(filter_var($_POST['editText'], FILTER_SANITIZE_STRING));
    $id = trim(filter_var($_POST['editCommentId'], FILTER_SANITIZE_STRING));

    $statement = $pdo->prepare('UPDATE comments SET text = :text WHERE id = :id');
    $statement->bindParam(':text', $text, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}
header('Location: ../../index.php');
