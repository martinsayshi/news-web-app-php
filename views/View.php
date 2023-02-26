<?php
namespace app\views;

class View {
    public static function renderView($view, $params = []) {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . "/$view.php";
        $content = ob_get_clean();
        include __DIR__ . "/layouts/main.php";
    }
}
