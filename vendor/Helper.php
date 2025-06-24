<?php

use Vendor\Route;

$__stacks = [];

/**
 * @param string $path
 * @return string
 *
 * Asset function is used to generate asset path.
 * You can access the asset via http://localhost/<asset-path>.
 */
function asset(string $path): string
{
    return '/' . ltrim($path, '/');
}

function base_path(string $path = ''): string
{
    return __DIR__ . '/../' . ltrim($path, '/');
}

/**
 * @param string $section
 * @param string $content
 * @return void
 *
 * This function is similar to the `push` function in Laravel,
 * but it stores the content in a stack.
 */
function push(string $section, string $content): void
{
    global $__stacks;

    if (!isset($__stacks[$section])) {
        $__stacks[$section] = [];
    }

    $__stacks[$section][] = $content;
}

function route(string $name, array $params = [])
{
    $path = Route::get_path_by_name($name);

    if (!$path) {
        throw new Exception("Perutean '$name' tidak ditemukan.");
    }

    foreach ($params as $key => $value) {
        $path = str_replace("{$key}", $value, $path);
    }

    return $path;
}

/**
 * @param string $section
 * @return void
 *
 * This function is similar to the `stack` function in Laravel,
 * but it outputs the content of the stack.
 */
function stack(string $section): void
{
    global $__stacks;

    if (!isset($__stacks[$section])) {
        return;
    }

    foreach ($__stacks[$section] as $content) {
        echo $content . PHP_EOL;
    }
}

/**
 * @param mixed $view
 * @param mixed $data
 * @return void
 * @throws Exception
 *
 * This function is used to render a view.
 */
function view($view, $data = []): void
{
    extract($data);

    ob_start();
    require __DIR__ . "/../resources/views/$view.php";
    $content = ob_get_clean();
    extract(['content' => $content]);

    require __DIR__ . "/../resources/layouts/main.php";
}