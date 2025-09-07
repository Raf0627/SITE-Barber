<?php
// pegar valores do POST de forma segura
$nome = trim($_POST['nome'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';
$senhaRpt = $_POST['senhaRpt'] ?? '';

// includes com caminho robusto
require_once __DIR__ . '/../src/conexao-db.php';
require_once __DIR__ . '/../classes/Cadastro.php';
require_once __DIR__ . '/../classes/CadastroController.php';

// instanciar/usar a controller conforme a implementação existente
$cadastro = new CadastroController($pdo,$nome,  $telefone,  $email,  $senha,  $senhaRpt);
$cadastro->cadastrarUser();

header('Location: home');
?>
