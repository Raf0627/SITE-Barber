<?php
namespace Src\Controller;

class Erro404Controller implements Controller
{
    public function render(): void
    {
        $page = 'erro404.php';
        include __DIR__ . '/../View/main.php';
    }
}