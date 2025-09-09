<main class="main-servicos">
    <section class="container-admin-banner">
        <h1>Cadastro de Clientes</h1>
    </section>

    <section class="container-form">
        <form method="post" action="cadastroIncludes">
            <input type="text" name="nome" placeholder="Nome">
            <input type="text" name="telefone" placeholder="Telefone">
            <input type="text" name="email" placeholder="E-mail">
            <input type="password" name="senha" placeholder="Senha">
            <input type="password" name="senhaRpt" placeholder="Confirmar senha">
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