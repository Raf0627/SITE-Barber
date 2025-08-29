<?php

  require "./src/conexao-db.php";
  require "./src/Modelo/Cliente.php";
  require "./src/Repositorio/ClienteRepositorio.php";
  require "./src/Modelo/Servico.php";
  require "./src/Repositorio/ServicoRepositorio.php";

  $clienteRepositorio = new ClienteRepositorio($pdo);
  $dadosClientes = $clienteRepositorio->opcoesClientes();

  $servicoRepositorio = new ServicoRepositorio($pdo);
  $dadosServicos = $servicoRepositorio->opcoesServicos();

?>

<main class="main-servicos">
  <div class="titulo" data-aos="zoom-in">
    <h1>Clientes</h1>
  </div>
  <div class="all-cards">
    <?php foreach ($dadosClientes as $cliente):?> 
        <div class='card col-12 col-md-4' style='width: 18rem;' data-aos='fade-up' data-aos-offset='75'>
          <div class='card-body'>
            <br>
            <h5 class='card-title'><?= $cliente->getId()?></h5>
            <p class='card-text'><?= $cliente->getNome()?></p>
            <p class='card-text'><?= $cliente->getEmail()?></p>
            <p class='card-text'><?= $cliente->getSenha()?></p>
          </div>
        </div>
    <?php endforeach; ?>
  </div>

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
</main>