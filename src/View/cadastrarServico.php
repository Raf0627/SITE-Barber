<?php
    if(isset($_POST['cadastro'])) {
    $servico = new Servico(
    null,
    $_POST['nome'],
    $_POST['tempo'],
    $_POST['preco']
);
    if (isset($_FILES['imagem']))
    {
        $servico->setImagem(uniqid().$_FILES['imagem'],['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'],$servico->getImagemDiretorio());
    };

    $servicoRepositorio = new ServicoRepositorio($pdo);
    $servicoRepositorio->salvar($servico);

    header("Location: servicosAdmin");
}
?>

<main class="main-servicos">
    <section class="container-admin-banner">
        <h1>Cadastro de Produtos</h1>
        <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
    </section>
    <section class="container-form">
        <form method="post" enctype="multipart/form-data">

            <label for="nome">Nome</label>
            <input name="nome" type="text" id="nome" placeholder="Digite o nome do produto" required>
            
            <label for="preco">Preço</label>
            <input name="preco" type="text" id="preco" placeholder="Digite uma descrição" required>
            
            <label for="tempo">Tempo</label>
            <input name="tempo" type="text" id="tempo" placeholder="Digite uma descrição" required>
            <label for="imagem">Envie uma imagem do produto</label>
            <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">

            <input name="cadastro" type="submit" class="botao-cadastrar" value="Cadastrar produto"/>
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