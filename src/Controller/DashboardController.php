<?php
namespace Src\Controller;

class DashboardController implements Controller
{
    public function render(): void
    {
        $page = 'dashboard.php';
        include __DIR__ . '/../View/main.php';
    }
}