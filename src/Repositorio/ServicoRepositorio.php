<?php

class ServicoRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function opcoesServicos(): array
    {


        $sql1 = "SELECT * FROM servicos ORDER BY preco DESC";
        $statement = $this->pdo->query($sql1);
        $servicos = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosServicos = array_map(function ($servico) {
            return new Servico(
                $servico['id'],
                $servico['nome'],
                $servico['tempo'],
                $servico['imagem'],
                $servico['preco']
            );
        }, $servicos);

        return $dadosServicos;
    }
}
