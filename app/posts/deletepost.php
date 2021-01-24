<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// print_r($_POST);
if (isset($_POST['delete'])) {
    $post_id = trim(filter_var($_POST['delete'], FILTER_SANITIZE_STRING));
    $post_id = (int) $post_id;
    deletePost($pdo, $post_id);
}

header('Location: ../../index.php');
