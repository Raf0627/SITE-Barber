<?php
namespace Src\Controller;

class GaleriaController implements Controller
{
    public function render(): void
    {
        $page = 'galeria.php';
        include __DIR__ . '/../View/main.php';
    }
}