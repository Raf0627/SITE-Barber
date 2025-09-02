<?php
if (isset($_POST['cadastro'])) {
    // Entrada segura mínima
    $nome = trim($_POST['nome'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if ($nome === '' || $telefone === '' || $email === '' || $senha === '') {
        // pode adicionar feedback ao usuário aqui se desejar
    } else {
        // armazenar senha com hash
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Cliente exige um int para id; usar 0 para novos registros
        $cliente = new Cliente(0, $nome, $telefone, $email, $senhaHash);

        $clienteRepositorio = new ClienteRepositorio($pdo);
        $clienteRepositorio->salvar($cliente);

        header("Location: clientesAdmin");
        exit;
    }
}
?>

<main class="main-servicos">
    <section class="container-admin-banner">
        <h1>Cadastro de Clientes</h1>
        <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
    </section>

    <section class="container-form">
        <form method="post" enctype="multipart/form-data" data-parsley-validate autocomplete="off">

            <label for="nome">Nome</label>
            <input name="nome" type="text" id="nome" placeholder="Digite seu nome" required
                data-parsley-required-message="Digite um nome!">

            <label for="telefone">Telefone</label>
            <input id="tel" name="telefone" type="text" placeholder="Ex: (99) 99999 9999" required
                data-parsley-required-message="Digite um número de telefone!"
                data-parsley-minlength="15" data-parsley-minlength-message="Digite um número de telefone válido">

            <label for="email">E-mail</label>
            <input name="email" type="email" id="email" placeholder="Ex: nome@email.com" required
                data-parsley-required-message="Digite um e-mail!"
                data-parsley-type-message="Digite um e-mail válido!">

            <label for="senha">Senha</label>
            <input name="senha" type="password" id="senha" placeholder="Crie uma senha" required
                data-parsley-required-message="Senha obrigatória" data-parsley-minlength="6"
                data-parsley-minlength-message="A senha precisa ter ao menos 6 caracteres">

            <label for="senha_confirm">Confirme a senha</label>
            <input name="senha_confirm" type="password" id="senha_confirm" placeholder="Repita a senha" required
                data-parsley-equalto="#senha" data-parsley-required-message="Confirme a senha"
                data-parsley-equalto-message="As senhas não coincidem">

            <input name="cadastro" type="submit" class="botao-cadastrar" value="Cadastrar cliente" />
        </form>
    </section>
</main>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #f7f7f7;
        margin: 0
    }

    .main-servicos {
        max-width: 900px;
        margin: 24px auto;
        padding: 12px
    }

    .container-admin-banner {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px
    }

    .container-form {
        background: #fff;
        padding: 12px;
        border-radius: 8px
    }

    .container-form input[type="text"],
    .container-form input[type="file"],
    .container-form input[type="email"],
    .container-form input[type="password"],
    .container-form textarea {
        width: 100%;
        padding: 8px;
        margin-top: 6px
    }

    .botao-cadastrar {
        background: #7B5CFF;
        color: #fff;
        padding: 10px 14px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        margin-top: 10px
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form[data-parsley-validate]');
        if (form) {
            form.addEventListener('submit', function(e) {
                if (!$(form).parsley().isValid()) {
                    e.preventDefault();
                    Swal.fire({
                        text: 'Preencha todos os campos corretamente!',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn-agendar'
                        }
                    });
                }
            });
        }
    });
</script>