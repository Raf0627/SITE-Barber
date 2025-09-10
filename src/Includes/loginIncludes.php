<?php
// pegar valores do POST de forma segura
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

// includes com caminho robusto
require_once __DIR__ . '/../src/conexao-db.php';
require_once __DIR__ . '/../classes/Login.php';
require_once __DIR__ . '/../classes/LoginController.php';

// instanciar/usar a controller conforme a implementação existente
$login = new LoginController($pdo,$email,  $senha);
$login->loginUser();

header('Location: home');
}
?>
