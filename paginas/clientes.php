<?php

  $clienteRepositorio = new ClienteRepositorio($pdo);
  $dadosClientes = $clienteRepositorio->listar();

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
            <p class='card-text'><?= $cliente->getTelefone()?></p>
            <p class='card-text'><?= $cliente->getEmail()?></p>
            <p class='card-text'><?= $cliente->getSenha()?></p>
          </div>
        </div>
    <?php endforeach; ?>
  </div>
</main>