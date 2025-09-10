<?php
namespace Src\Controller;

class HomeController implements Controller
{
    public function render(): void
    {
        $page = 'home.php';
        include __DIR__ . '/../View/main.php';
    }
}