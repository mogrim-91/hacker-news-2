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
//not sure if gonna use this yet, but just fetching one post...
function getPost(PDO $pdo, int $id)
{
    $statement = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $post = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $post;
}

function deletePost(PDO $pdo, int $id)
{
    $statement = $pdo->prepare('DELETE FROM posts WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();
}

function hasUpvoted(PDO $pdo, int $post_id, int $user_id): bool
{
    $statement = $pdo->prepare('SELECT * FROM upvotes WHERE post_id = :post_id AND user_id = :user_id');
    $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $upvoted = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($upvoted) {
        return true;
    }
    return false;
}

function countUpvotes(PDO $pdo, int $post_id)
{
    $statement = $pdo->prepare('SELECT COUNT(post_id) FROM upvotes WHERE post_id = :post_id');
    $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $statement->execute();

    $count = $statement->fetchColumn();
    if ($count) {
        return $count;
    }
    return 0;
}
