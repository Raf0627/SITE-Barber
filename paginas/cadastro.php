<main class="main-servicos">
    <section class="container-admin-banner">
        <h1>Cadastro de Clientes</h1>
    </section>

    <section class="container-form">
        <form method="post" action="cadastroIncludes" data-parsley-validate autocomplete="off">
            <input type="text" name="nome" placeholder="Nome" required data-parsley-required-message="Digite um nome!" maxlength="18">
            <input id="tel" type="text" name="telefone" placeholder="Telefone" required data-parsley-required-message="Digite um número de telefone!" data-parsley-minlength="10" data-parsley-minlength-message="Digite um número de telefone válido!">
            <input type="email" name="email" placeholder="E-mail" required data-parsley-required-message="Digite um e-mail!" data-parsley-type-message="Digite um e-mail válido!">
            <input id="senha" type="password" name="senha" placeholder="Senha" required data-parsley-required-message="Digite uma senha!" data-parsley-minlength="6" data-parsley-minlength-message="A senha deve ter no mínimo 6 caracteres">
            <input type="password" name="senhaRpt" placeholder="Confirmar senha" required data-parsley-required-message="Confirme a senha!" data-parsley-equalto="#senha" data-parsley-equalto-message="As senhas não conferem!">
            <br>
            <button type="submit" name="submit">Cadastrar</button>
        </form>
    </section>
    <br>
    <a href="login"></a>
</main>

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