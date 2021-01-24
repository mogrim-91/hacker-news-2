<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<main>
    <?php $posts = getPosts($pdo); ?>
    <?php foreach ($posts as $post) : ?>
        <article>
            <h1><?php echo $post['title']; ?></h1>
            <a href="<?php echo $post['url']; ?>"><?php echo $post['url']; ?></a>
            <p><?php echo $post['description']; ?></p>
            <?php if (authenticated()) : ?>
                <?php if ($post['user_id'] === $_SESSION['loggedIn']['id']) : ?>
                    <form action="/app/posts/deletepost.php" method="post">
                        <button class="deletePost" name="delete" id="delete" type="submit" value="<?php echo $post['id']; ?>">Delete</button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>
        </article>
    <?php endforeach; ?>


</main>









<?php require __DIR__ . '/views/footer.php';
