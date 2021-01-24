<?php

declare(strict_types=1);

session_start();

require __DIR__ . '/functions.php';

$config = require __DIR__ . '/config.php';

$pdo = new PDO($config['database_path']);
