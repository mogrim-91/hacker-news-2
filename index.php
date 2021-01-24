<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<main>
    <?php $posts = getPosts($pdo); ?>
    <?php foreach ($posts as $post) : ?>
        <article>
            <h1><?php echo $post['title']; ?></h1>
            <a href="<?php echo $post['url']; ?>"><?php echo $post['url']; ?></a>
            <p><?php echo $post['description']; ?></p>
        </article>
    <?php endforeach; ?>


</main>









<?php require __DIR__ . '/views/footer.php';
