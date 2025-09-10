<?php

namespace Src\Controller;

class SobreController implements Controller
{
    public function render(): void
    {
        $page = 'sobre.php';
        include __DIR__ . '/../View/main.php';
    }
}
