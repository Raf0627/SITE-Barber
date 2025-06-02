<main class="main-contato">
    <div class="titulo" data-aos="zoom-in">
        <p>Contato</p>
    </div>
    <form data-aos="zoom-in" data-parsley-validate>
        <label for="nome">Nome:</label>
        <br>
        <input name="nome" type="text" placeholder="Ex: Nome" required required data-parsley-required-message="Digite um nome!">
        <br>
        <br>
        <label for="numb">Nº de telefone:</label>
        <br>
        <input id="tel" class="tel" name="telefone" type="text" placeholder="Ex: (99) 99999 9999"
            required
            data-parsley-required-message="Digite um número de telefone!"
            data-parsley-minlength="15"
            data-parsley-minlength-message="Digite um número de telefone! válido">
        <br>
        <br>
        <label for="numb">E-mail:</label>
        <br>
        <input name="email" type="email" placeholder="Ex: nome@email.com" required data-parsley-required-message="Digite um e-mail!" data-parsley-type-message="Digite um e-mail válido!">
        <br>
        <br>
        <label for="servicos">Serviço:</label>
        <select name="servicos" id="servicos" required data-parsley-required-message="Selecione um serviço">
            <option class="opcao-n" value=" " disabled selected>Selecione uma opção:</option>
            <option value="cbs">Cabelo+Sobrancelha+Barba - R$90,00</option>
            <option value="cb">Cabelo+Barba - R$80,00</option>
            <option value="cs">Cabelo+Sobrancelha - R$60,00</option>
            <option value="c">Cabelo - R$45,00</option>
            <option value="b">Barba - R$40,00</option>
            <option value="s">Sobrancelha - R$20,00</option>
        </select>
        <br>
        <br>
        <label for="periodo">Período:</label>
        <select name="periodo" id="periodo" required required data-parsley-required-message="Selecione um período!">
            <option class="opcao-n" value=" " disabled selected>Selecione uma opção:</option>
            <option value="m">Manhã</option>
            <option value="t">Tarde</option>
            <option value="n">Noite</option>
        </select>
        <br>
        <br>
        <div class="opcoes">
            <label for="conversa" class="pergunta">Quer conversar durante o serviço?</label>
            <label class="alternativa"><input type="radio" name="opcao" value="S" checked>Sim</label>
            <label class="alternativa"><input type="radio" name="opcao" value="N">Não</label>
        </div>
        <br>
        <br>
        <button type="" id="btn-whatsapp" class="btn btn-success btn-lg">Enviar <img src="/SITE-Barber/imgs/whatsapp.png" alt=""></button>
    </form>
</main>
<script>
    // Pega o parâmetro "servico" da URL
    function getParam(name) {
        const url = new URL(window.location.href);
        return url.searchParams.get(name);
    }
    const servico = getParam('servico');
    if (servico) {
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('servicos');
            if (select) select.value = servico;
        });
    }

    // WhatsApp personalizado só após validação
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        if (form) {
            $(form).parsley().on('form:success', function() {
                // Substitua pelo número do barbeiro
                const numeroBarbeiro = '554498264244';

                const nome = form.querySelector('input[name="nome"]').value;
                const telefone = form.querySelector('input[name="telefone"]').value;
                const email = form.querySelector('input[name="email"]').value;
                const servico = form.querySelector('#servicos').options[form.querySelector('#servicos').selectedIndex].text;
                const periodo = form.querySelector('#periodo').options[form.querySelector('#periodo').selectedIndex].text;
                const conversa = form.querySelector('input[name="opcao"]:checked').value === 'S' ? 'Sim' : 'Não';

                const mensagem = `Olá! Gostaria de agendar um horário:%0A` +
                    `Nome: ${nome}%0A` +
                    `Telefone: ${telefone}%0A` +
                    `E-mail: ${email}%0A` +
                    `Serviço: ${servico}%0A` +
                    `Período: ${periodo}%0A` +
                    `Quer conversar durante o serviço? ${conversa}`;

                window.open(`https://wa.me/${numeroBarbeiro}?text=${mensagem}`, '_blank');
            });

            // Aciona mensagem de erro se o formulário não for válido
            $(form).parsley().on('form:error', function() {
                mensagem();
            });
        }
    });

    mensagem = function() {
        Swal.fire({
            text: `Preencha todos os campos corretamente!`,
            icon: `error`
        })
    };
</script>