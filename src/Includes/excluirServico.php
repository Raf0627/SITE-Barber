<?php

    $servicoRepositorio = new ServicoRepositorio($pdo);

    $servicoRepositorio->excluir($_POST['id']);

    header("Location: servicosAdmin");