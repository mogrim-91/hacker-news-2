<?php

declare(strict_types=1);
require __DIR__ . '/app/autoload.php';

unset($_SESSION['loggedIn']);
unset($user);

header('Location: /index.php');
