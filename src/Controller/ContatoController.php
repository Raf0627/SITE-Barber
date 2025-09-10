<?php
namespace Src\Controller;

class ContatoController implements Controller
{
    public function render(): void
    {
        $page = 'contato.php';
        include __DIR__ . '/../View/main.php';
    }
}