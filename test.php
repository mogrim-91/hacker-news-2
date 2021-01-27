<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>
<?php

$statement = $pdo->prepare('SELECT posts.*, COUNT(upvotes.post_id) as votecount
    from posts
    INNER JOIN upvotes
    ON posts.id = upvotes.post_id
    GROUP BY posts.id
    ORDER BY votecount DESC');
$statement->execute();

$posts1 = $statement->fetchAll(PDO::FETCH_ASSOC);



$statement = $pdo->prepare('SELECT * FROM posts');
$statement->execute();

$posts2 = $statement->fetchAll(PDO::FETCH_ASSOC);

$posts = array_unique(array_merge(array_values($posts1), array_values($posts2)), SORT_REGULAR);
print_r($posts);
