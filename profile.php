<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php'; ?>

<?php if (!authenticated()) {
    Header('Location:/index.php');
} ?>











<?php require __DIR__ . '/views/footer.php';
