<main>
    <div class="titulo" data-aos="zoom-in">
        <p>Contato</p>
    </div>
    <form data-aos="zoom-in">
        <label for="nome">Informe seu nome:</label>
        <br>
        <input type="text" placeholder="Ex: Nome">
        <br>
        <br>
        <label for="numb">Digite seu número:</label>
        <br>
        <input type="text" placeholder="Ex: (99) 99999 9999">
        <br>
        <br>
        <label for="numb">Digite seu email:</label>
        <br>
        <input type="email" placeholder="Ex: nome@email.com">
        <br>
        <br>
        <label for="servicos">Escolha um serviço:</label>
        <select name="servicos" id="servicos">
            <option value="n"></option>
            <option value="cbs">Cabelo+Sobrancelha+Barba - R$90,00</option>
            <option value="cb">Cabelo+Barba - R$80,00</option>
            <option value="cs">Cabelo+Sobrancelha - R$60,00</option>
            <option value="c">Cabelo - R$45,00</option>
            <option value="b">Barba - R$40,00</option>
            <option value="s">Sobrancelha - R$20,00</option>
        </select>
        <br>
        <br>
        <div class="opcoes">
            <label for="conversa" class="pergunta">Quer conversar durante o serviço?</label>
            <label class="alternativa"><input type="radio" name="opcao" value="S">Sim</label>
            <label class="alternativa"><input type="radio" name="opcao" value="N">Não</label>
        </div>
        <br>
        <br>
        <button type="button" id="btn-whatsapp" class="btn btn-success btn-lg">Enviar <img src="/SITE-Barber/imgs/whatsapp.png" alt=""></button>
    </form>
</main>
<script>
    window.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const servico = urlParams.get('servico');
        if (servico) {
            const select = document.getElementById('servicos');
            if (select) select.value = servico;
        }
    });

    document.getElementById('btn-whatsapp').addEventListener('click', function(e) {
        // Pegue os valores do formulário
        const nome = document.querySelector('input[placeholder="Ex: Nome"]').value.trim();
        const telefone = document.querySelector('input[placeholder="Ex: (99) 99999 9999"]').value.trim();
        const email = document.querySelector('input[placeholder="Ex: nome@email.com"]').value.trim();
        const servico = document.getElementById('servicos').options[document.getElementById('servicos').selectedIndex].text;
        const conversa = document.querySelector('input[name="opcao"]:checked');
        const conversaTxt = conversa ? conversa.value === "S" ? "Sim" : "Não" : "";

        // Monta a mensagem
        let mensagem = `Olá! Gostaria de agendar um horário.\n\nNome: ${nome}\nTelefone: ${telefone}\nEmail: ${email}\nServiço: ${servico}\nConversar durante o serviço?: ${conversaTxt}`;

        // Codifica a mensagem para URL
        mensagem = encodeURIComponent(mensagem);

        // Número do WhatsApp (coloque o número desejado com DDD e país, só números)
        const numero = "554498264244";

        // Abre o WhatsApp com a mensagem pronta
        window.open(`https://wa.me/${numero}?text=${mensagem}`, '_blank');
    });
</script>