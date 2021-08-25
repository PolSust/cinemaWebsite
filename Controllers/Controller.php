<?php

namespace App\Controllers;

abstract class Controller
{
    public function render(string $path, array $data = [], string $template = "base"): void
    {
        extract($data);

        ob_start();

        include dirname(__DIR__) . '/Views/' . $path . '.php';

        $content = ob_get_clean();

        include dirname(__DIR__) . '/Views/templates/' . $template . '.php';
    }
}
