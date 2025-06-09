<main class="main-servicos">
  <div class="titulo" data-aos="zoom-in">
    <h1>Serviços</h1>
  </div>
  <div class="all-cards">
    <?php
    include "array.php";
    // Mapeamento para o parâmetro de serviço na URL
    $servicoParams = [
      "Cabelo + Barba + Sobrancelha" => "cbs",
      "Cabelo + Barba" => "cb",
      "Cabelo + Sobrancelha" => "cs",
      "Cabelo" => "c",
      "Barba" => "b",
      "Sobrancelha" => "s"
    ];
    foreach ($servicos as $dados) {
      $nome = $dados['nome'];
      $foto = $dados['foto'];
      $valor = $dados['valor'];
      $param = isset($servicoParams[$nome]) ? $servicoParams[$nome] : "";
      echo "
        <div class='card col-12 col-md-4' style='width: 18rem;' data-aos='zoom-in'>
          <img src='{$foto}' class='card-img-top' alt='ícone de cortes'>
          <div class='card-body'>
            <br>
            <h5 class='card-title'>{$nome}</h5>
            <p class='card-text'>{$valor}</p>
            <a href='contato?servico={$param}' class='btn btn-primary agendar-btn' data-servico='{$param}' title='Agendar'>Agendar</a>
          </div>
        </div>
        ";
    }
    ?>
  </div>
</main>