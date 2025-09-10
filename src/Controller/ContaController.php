<?php
namespace Src\Controller;

class ContaController implements Controller
{
    public function render(): void
    {
        $page = 'conta.php';
        include __DIR__ . '/../View/main.php';
    }
}