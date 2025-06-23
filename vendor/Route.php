<?php

namespace Vendor;

use Exception;
use Throwable;

class Route {
    private static array $routes = [];

    public static function get(string $path, array|callable $callback): void
    {
        self::$routes['GET'][$path] = $callback;
    }

    public static function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $handler = self::$routes[$method][$uri] ?? null;

        if (!$handler) {
            self::not_found($uri);
            return;
        }

        try {
            self::execute($handler);
        } catch (Throwable $throwable) {
            self::error($throwable);
        }
    }

    private static function execute(array|callable $handler): void
    {
        if (is_array($handler)) {
            [$class, $method] = $handler;
            $instance = new $class();
            call_user_func([$instance, $method]);
        } elseif (is_callable($handler)) {
            call_user_func($handler);
        } else {
            throw new Exception("Handler tidak valid, harus array atau callable.");
        }
    }

    private static function not_found(string $uri): void
    {
        Log::error("Halaman tidak ditemukan: $uri");
        http_response_code(404);
    }

    private static function error(Throwable $e): void
    {
        Log::error("Terjadi kesalahan pada server: " . $e->getMessage());
        http_response_code(500);
    }
}