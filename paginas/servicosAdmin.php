<?php

  $servicoRepositorio = new ServicoRepositorio($pdo);
  $dadosServicos = $servicoRepositorio->opcoesServicos();

?>

<main class="main-servicos">
  <div class="titulo" data-aos="zoom-in">
    <h1>Serviços</h1>
  </div>
  
        <button><a href="cadastrarServico">Cadastrar</a></button>
  <div class="all-cards">
    <?php foreach ($dadosServicos as $servico):?> 
        <div class='card col-12 col-md-4' style='width: 18rem;' data-aos='fade-up' data-aos-offset='75'>
            
        <form action="excluirServico" method="post">
          <input type="hidden" name="id" value="<?= $servico->getId()?>">
          <input type="submit" value="Excluir">
          <a href="?param=editarServico&id=<?= $servico->getId()?>">Editar</a>
        </form>
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