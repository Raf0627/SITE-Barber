<?php

use Src\Controller\ContaController;
use Src\Controller\ContatoController;
use Src\Controller\DashboardController;
use Src\Controller\Erro404Controller;
use Src\Controller\GaleriaController;
use Src\Controller\HomeController;
use Src\Controller\ServicosController;
use Src\Controller\SobreController;

$uri = $_SERVER['REQUEST_URI'];

$pages = [
    '/conta' => new ContaController,
    '/contato' => new ContatoController,
    '/dashboard' => new DashboardController,
    '/galeria' => new GaleriaController,
    '/home' => new HomeController,
    '/servicos' => new ServicosController,
    '/sobre' => new SobreController
];

$controller = $pages[$uri] ?? new Erro404Controller;

$controller->render();

?>




