<?php

declare(strict_types=1);

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// Register autoloader
require_once __DIR__ . '/../vendor/Controller.php';
require_once __DIR__ . '/../vendor/Exception.php';
require_once __DIR__ . '/../vendor/Log.php';
require_once __DIR__ . '/../vendor/Route.php';

// Register controllers
require_once __DIR__ . '/../app/Auth.php';
require_once __DIR__ . '/../app/Home.php';

// Register web routes
require_once __DIR__ . '/../routes/web.php';