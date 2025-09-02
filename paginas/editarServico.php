<?php
    $servicoRepositorio = new ServicoRepositorio($pdo);
    if (isset($_POST['editar'])) {
        $servico = new Servico(
    $_POST['id'],
    $_POST['nome'],
    $_POST['tempo'],
    $_POST['preco']);
    $servicoRepositorio->atualizar($servico);
    header("Location: servicosAdmin");
    }
    else {$servico = $servicoRepositorio->buscar($_GET['id']);}
?>
<main class="main-servicos">
  <section class="container-admin-banner">
    <h1>Editar Produto</h1>
  </section>
  <section class="container-form">
    <form method="post" enctype="multipart/form-data">

      <label for="nome">Nome</label>
      <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" value="<?= $servico->getNome()?>" required>

      
      <label for="preco">Preço</label>
      <input type="text" name="preco" id="preco" value="<?= number_format($servico->getPreco(),2)?>" placeholder="Digite uma descrição" required>
      
      <label for="tempo">Tempo</label>
      <input type="text" name="tempo" id="tempo" value="<?= $servico->getTempo()?>" placeholder="Digite uma descrição" required>

      <label for="imagem">Envie uma imagem do servico</label>
      <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">
        <input type="hidden" name="id" value="<?= $servico->getId()?>">
      <input type="submit" name="editar" class="botao-cadastrar" value="Editar servico"/>
    </form>

  </section>
  </main>
<style>
body{font-family:Arial,Helvetica,sans-serif;background:#f7f7f7;margin:0}
.main-servicos{max-width:900px;margin:24px auto;padding:12px}
.container-admin-banner{display:flex;align-items:center;gap:12px;margin-bottom:12px}
.container-form{background:#fff;padding:12px;border-radius:8px}
.container-form input[type="text"],.container-form input[type="file"],.container-form textarea{width:100%;padding:8px;margin-top:6px}
.botao-cadastrar{background:#7B5CFF;color:#fff;padding:10px 14px;border:none;border-radius:6px;cursor:pointer;margin-top:10px}
</style>