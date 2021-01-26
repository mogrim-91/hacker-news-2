<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// print_r($_POST);
if (isset($_POST['deleteCommentId'])) {
    $id = trim(filter_var($_POST['deleteCommentId'], FILTER_SANITIZE_STRING));

    $statement = $pdo->prepare('DELETE FROM comments WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}

header('Location: ../../index.php');
