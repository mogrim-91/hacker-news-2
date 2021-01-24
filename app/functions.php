<?php

declare(strict_types=1);

function authenticated(): bool
{
    return isset($_SESSION['loggedIn']['username']);
}

function getPosts(PDO $pdo)
{
    $statement = $pdo->prepare('SELECT * FROM posts');
    $statement->execute();

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $posts;
}
