<?php

declare(strict_types=1);

// Check if logged in
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

function getComments(PDO $pdo, $post_id)
{
    $statement = $pdo->prepare('SELECT * FROM comments WHERE post_id = :post_id ORDER BY date ASC');
    $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $statement->execute();

    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($comments) {
        return $comments;
    }

    return false;
}

function getCommentReplies(PDO $pdo, $comment_id)
{
    $statement = $pdo->prepare('SELECT * FROM comment_replies WHERE comment_id = :comment_id ORDER BY date ASC');
    $statement->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
    $statement->execute();

    $replies = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($replies) {
        return $replies;
    }

    return false;
}


function getPostsByUpvotes(PDO $pdo)
{
    $statement = $pdo->prepare('SELECT posts.*, COUNT(upvotes.post_id) AS votes
    from posts
    LEFT JOIN upvotes
    ON posts.id = upvotes.post_id
    GROUP BY posts.id
    ORDER BY upvotes.post_id DESC');
    $statement->execute();

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $posts;
}

function getPostsByDate(PDO $pdo)
{
    $statement = $pdo->prepare('SELECT * FROM posts ORDER BY post_date DESC');
    $statement->execute();

    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $posts;
}

function getAvatar(PDO $pdo, int $userid)
{

    $statement = $pdo->prepare('SELECT avatar FROM users WHERE id = :id');
    $statement->bindParam(':id', $userid, PDO::PARAM_INT);
    $statement->execute();

    $avatar = $statement->fetch(PDO::FETCH_ASSOC);
    if ($avatar) {
        return $avatar;
    }
    return false;
}

function checkIfUsernameIsTaken(PDO $pdo, string $username): bool
{
    $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        return true;
    }
    return false;
}

function checkIfEmailIsTaken(PDO $pdo, string $email): bool
{
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();

    $email = $statement->fetch(PDO::FETCH_ASSOC);

    if ($email) {
        return true;
    }
    return false;
}
