<?php

namespace app\core;

class Router {

    protected array $routes = [];

    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve() {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        if (strpos($path, '?')) {
            $path = substr($path, 0, strpos($path, '?'));
        }
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        if ($method === 'get') {
            $callback = $this->routes['get'][$path] ?? null;
        } else {
            $callback = $this->routes['post'][$path] ?? null;
        }

        if ($callback) {
            call_user_func($callback);
        } else {
           echo "Page Not Found";
        }
    }
}