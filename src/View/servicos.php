<?php

  $servicoRepositorio = new ServicoRepositorio($pdo);
  $dadosServicos = $servicoRepositorio->opcoesServicos();

?>

<main class="main-servicos">
  <div class="titulo" data-aos="zoom-in">
    <h1>Serviços</h1>
  </div>
  <div class="all-cards">
    <?php foreach ($dadosServicos as $servico):?> 
        <div class='card col-12 col-md-4' style='width: 18rem;' data-aos='fade-up' data-aos-offset='75'>
          <img src=<?= $servico->getImagemDiretorio()?> class='card-img-top' alt='ícone de cortes'>
          <div class='card-body'>
            <br>
            <h5 class='card-title'><?= $servico->getNome()?></h5>
            <p class='card-text'><?='R$'. number_format($servico->getPreco(),2)?></p>
            <p class='card-text'><?= $servico->getTempo()?></p>
          </div>
        </div>
    <?php endforeach; ?>
  </div>
  <div class="overlay" id="overlay" onclick="fecharCard(event)">
    <form>
      <div class="card card-zoom" onclick="event.stopPropagation()">
        <i class="fa-solid fa-xmark x-btn" onclick="fecharCard(event)"></i>
        <img src="imgs/full.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text"></p>
          <label for="name">Digite seu nome:</label>
          <input type="text" class="card-input" id="nomeCliente" placeholder="Ex: Nome">
          <button type="button" id="btnAgendar" class="btn-agendar">Agendar <i class="fa-brands fa-whatsapp" aria-label="WhatsApp"></i></button>
        </div>
      </div>
    </form>
  </div>
</main>
<script>
  let servicoSelecionado = '';
  let valorSelecionado = '';

  function abrirCard(nome, foto, valor) {
    document.getElementById('overlay').style.display = 'flex';
    document.querySelector('#overlay .card-zoom .card-title').textContent = nome;
    document.querySelector('#overlay .card-zoom .card-img-top').src = foto;
    document.querySelector('#overlay .card-zoom .card-text').textContent = valor;
    servicoSelecionado = nome;
    valorSelecionado = valor;
    document.getElementById('nomeCliente').value = '';
  }

  function fecharCard(event) {
    document.getElementById('overlay').style.display = 'none';
  }

  mensagem = function() {
    Swal.fire({
      text: `Digite seu nome!`,
      icon: `error`,
      customClass: {
        confirmButton: 'btn-agendar'
      }
    })
  };

  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('btnAgendar').addEventListener('click', function() {
      const nome = document.getElementById('nomeCliente').value.trim();
      if (!nome) {
        mensagem();
        return;
      }
      // Número do WhatsApp do footer (sem espaços, com DDI e DDD)
      const numero = '554498264244';
      const texto = `Olá, meu nome é ${nome} e gostaria de agendar um serviço de ${servicoSelecionado} (${valorSelecionado})`;
      const url = `https://wa.me/${numero}?text=${encodeURIComponent(texto)}`;
      window.open(url, '_blank');
    });
  });
</script>