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
                $servico['preco'],
                $servico['imagem']
            );
        }, $servicos);

        return $dadosServicos;
    }



    private function formarObjeto($dados)
    {
        return new Servico(
            $dados['id'],
            $dados['nome'],
            $dados['tempo'],
            $dados['preco'],
            $dados['imagem']
        );
    }

    public function excluir(int $id)
    {
        $sql = "DELETE FROM servicos WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
    }

    public function salvar(Servico $servico)
    {
        $sql = 'INSERT INTO servicos (nome,tempo,imagem,preco) VALUES (?,?,?,?)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $servico->getNome());
        $statement->bindValue(2, $servico->getTempo());
        $statement->bindValue(3, $servico->getImagem());
        $statement->bindValue(4, $servico->getPreco());
        $statement->execute();
    }

    public function buscar(int $id)
    {
        $sql = 'SELECT * FROM servicos WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);
    }

    public function atualizar(Servico $servico)
    {
        $sql = 'UPDATE servicos SET nome = ?, tempo = ?, imagem = ?, preco = ? WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $servico->getNome());
        $statement->bindValue(2, $servico->getTempo());
        $statement->bindValue(3, $servico->getImagem());
        $statement->bindValue(4, $servico->getPreco());
        $statement->bindValue(5, $servico->getId());
        $statement->execute();
    }
}
