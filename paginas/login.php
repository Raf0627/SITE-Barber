<?php

session_start();

$mensagemErro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    // carrega repositório como nas outras páginas
    $clienteRepositorio = new ClienteRepositorio($pdo);
    $clientes = $clienteRepositorio->opcoesClientes();

    $usuarioEncontrado = null;
    foreach ($clientes as $cliente) {
        if ($cliente->getEmail() === $email && $cliente->getSenha() === $senha) {
            $usuarioEncontrado = $cliente;
            break;
        }
    }

    if ($usuarioEncontrado) {
        // salva id do cliente na sessão e redireciona para a área admin (mesma lógica do site)
        $_SESSION['cliente_id'] = $usuarioEncontrado->getId();
        header('Location: admin');
        exit;
    } else {
        $mensagemErro = 'E-mail ou senha inválidos.';
    }
}
?>

<main class="main-servicos">
  <div class="titulo" data-aos="zoom-in">
    <h1>Login</h1>
  </div>

  <div class="container" style="max-width:480px;">
    <?php if ($mensagemErro): ?>
      <div class="alert alert-danger" role="alert"><?= htmlspecialchars($mensagemErro) ?></div>
    <?php endif; ?>

    <form method="post" novalidate>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
      </div>

      <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" required>
      </div>

      <button type="submit" class="btn btn-primary">Entrar</button>
      <a href="home" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</main>