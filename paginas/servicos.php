<main class="main-servicos">
  <div class="titulo" data-aos="zoom-in">
    <h1>Serviços</h1>
  </div>
  <div class="all-cards">
    <?php
    include "array.php";

    foreach ($servicos as $dados) {
      $nome = $dados['nome'];
      $foto = $dados['foto'];
      $valor = $dados['valor'];;
      echo "
        <div class='card col-12 col-md-4' style='width: 18rem;' data-aos='fade-up' data-aos-offset='75'>
          <img src='{$foto}' class='card-img-top' alt='ícone de cortes'>
          <div class='card-body'>
            <br>
            <h5 class='card-title'>{$nome}</h5>
            <p class='card-text'>{$valor}</p>
            <a onclick='abrirCard(\"{$nome}\", \"{$foto}\",\"{$valor}\")' class='btn agendar-btn' title='Agendar'>Agendar</a>
          </div>
        </div>
        ";
    }
    ?>
  </div>
  <div class="overlay" id="overlay" onclick="fecharCard(event)">
    <div class="card" onclick="event.stopPropagation()">
      <div class="card card-zoom" onclick="event.stopPropagation()" style="width: 500px;">
        <img src="imgs/full.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text"></p>
          <label for="name">nome</label>
          <input type="text" class="card-text"></input>
          <a href="#" class="">Agendar<i class="fa-brands fa-whatsapp" aria-label="WhatsApp"></i></a>
        </div>
      </div>
    </div>
  </div>
</main>
<script>
  function abrirCard(nome, foto, valor) {
    document.getElementById('overlay').style.display = 'flex';
    // Atualiza o valor e a foto no card do overlay
    document.querySelector('#overlay .card-zoom .card-title').textContent = nome;
    document.querySelector('#overlay .card-zoom .card-img-top').src = foto;
    document.querySelector('#overlay .card-zoom .card-text').textContent = valor;
  }

  function fecharCard(event) {
    document.getElementById('overlay').style.display = 'none';
  }
</script>