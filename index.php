<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<main>

    <?php $posts = getPosts($pdo); ?>
    <?php foreach ($posts as $post) : ?>
        <article>
            <div class="postSection">
                <div class="upvotes">
                    <h2><?php echo countUpvotes($pdo, $post['id']); ?></h2>

                    <?php if (authenticated()) : ?>
                        <?php if (hasUpvoted($pdo, $post['id'], $_SESSION['loggedIn']['id'])) : ?>
                            <form action="/app/upvotes/removeupvote.php" method="post">
                                <button class="removeUpvote" name="removeUpvote" id="removeUpvote" type="submit" value="<?php echo $post['id']; ?>">Remove</button>
                            </form>
                        <?php else : ?>
                            <form action="/app/upvotes/upvote.php" method="post">
                                <button class="upvote" name="upvote" id="upvote" type="submit" value="<?php echo $post['id']; ?>">Upvote</button>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="post">
                    <a href="<?php echo $post['url']; ?>"><?php echo $post['title']; ?></a>
                    <p><?php echo $post['description']; ?></p>





                    <div class="postBottom">
                        <p><?php echo $post['post_date']; ?></p>
                        <?php if (authenticated()) : ?>
                            <?php if ($post['user_id'] === $_SESSION['loggedIn']['id']) : ?>
                                <form action="editpost.php" method="post">
                                    <button class="editPost" name="editPostId" id="editPostId" type="submit" value="<?php echo $post['id']; ?>">Edit post</button>
                                </form>
                            <?php endif; ?>
                            <?php if ($post['user_id'] === $_SESSION['loggedIn']['id']) : ?>
                                <form action="/app/posts/deletepost.php" method="post">
                                    <button class="deletePost" name="delete" id="delete" type="submit" value="<?php echo $post['id']; ?>">Delete</button>
                                </form>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="commentSection">

                <?php $comments = getComments($pdo, $post['id']); ?>
                <?php if ($comments) : ?>
                    <p>Comments:</p>
                    <?php foreach ($comments as $comment) : ?>

                        <div class="comments">
                            <strong>By: <?php echo $comment['author']; ?></strong>
                            <p> <?php echo $comment['text']; ?></p>
                            <p> Posted: <?php echo $comment['date']; ?></p>
                            <?php if (authenticated()) : ?>
                                <?php if ($_SESSION['loggedIn']['id'] === $comment['user_id']) : ?>
                                    <form action="editcomment.php" method="post">
                                        <button class="editComment" name="editCommentId" id="editCommentId" type="submit" value="<?php echo $comment['id']; ?>">Edit comment</button>
                                    </form>
                                    <form action="/app/comments/deletecomment.php" method="post">
                                        <button class="deleteComment" name="deleteCommentId" id="deleteCommentId" type="submit" value="<?php echo $comment['id']; ?>">Delete comment</button>
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>


                    <?php endforeach; ?>
                <?php endif; ?>


                <?php if (authenticated()) : ?>
                    <form action="/app/comments/createcomment.php" method="post">
                        <label for="comment">Comment:</label>
                        <input type="text" name="comment" id="comment">
                        <button class="commentButton" name="commentPostId" id="commentPostId" value="<?php echo $post['id']; ?>" type="submit">Publish</button>
                    </form>
                <?php endif; ?>
            </div>
        </article>
    <?php endforeach; ?>


</main>









<?php require __DIR__ . '/views/footer.php';
