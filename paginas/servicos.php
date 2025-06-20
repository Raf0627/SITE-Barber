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
            <a onclick='abrirCard()' class='btn agendar-btn' title='Agendar'>Agendar</a>
          </div>
        </div>
        ";
    }
    ?>
  </div>
  <div class="overlay" id="overlay" onclick="fecharCard(event)">
    <div class="card-zoom card" onclick="event.stopPropagation()">
      Olá
    </div>
  </div>
</main>
<script>
  function abrirCard() {
        document.getElementById('overlay').style.display = 'flex';
      }
  
      function fecharCard(event) {
        document.getElementById('overlay').style.display = 'none';
      }
</script>