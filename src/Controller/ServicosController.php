<?php
namespace Src\Controller;

class ServicosController implements Controller
{
    public function render(): void
    {
        $page = 'servicos.php';
        include __DIR__ . '/../View/main.php';
    }
}