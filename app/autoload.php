<?php

declare(strict_types=1);

session_start();

$config = require __DIR__ . '/config.php';

$pdo = new PDO($config['database_path']);
