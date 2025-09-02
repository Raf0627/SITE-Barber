<?php

class ClienteRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function listar(): array
    {
        $sql = "SELECT id, nome, telefone, email, senha FROM clientes ORDER BY id";
        $statement = $this->pdo->query($sql);
        $clientes = $statement->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function ($dados) {
            return $this->formarObjeto($dados);
        }, $clientes);
    }

    private function formarObjeto(array $dados): Cliente
    {
        return new Cliente(
            (int) $dados['id'],
            $dados['nome'],
            $dados['telefone'],
            $dados['email'],
            $dados['senha']
        );
    }

    public function buscar(int $id): ?Cliente
    {
        $sql = "SELECT id, nome, telefone, email, senha FROM clientes WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);
        if ($dados === false) {
            return null;
        }

        return $this->formarObjeto($dados);
    }

    public function salvar(Cliente $cliente): void
    {
        $sql = "INSERT INTO clientes (nome, telefone, email, senha) VALUES (?, ?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $cliente->getNome(), PDO::PARAM_STR);
        $statement->bindValue(2, $cliente->getTelefone(), PDO::PARAM_STR);
        $statement->bindValue(3, $cliente->getEmail(), PDO::PARAM_STR);
        $statement->bindValue(4, $cliente->getSenha(), PDO::PARAM_STR);
        $statement->execute();
    }

    public function atualizar(Cliente $cliente): void
    {
        $sql = "UPDATE clientes SET nome = ?, telefone = ?, email = ?, senha = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $cliente->getNome(), PDO::PARAM_STR);
        $statement->bindValue(2, $cliente->getTelefone(), PDO::PARAM_STR);
        $statement->bindValue(3, $cliente->getEmail(), PDO::PARAM_STR);
        $statement->bindValue(4, $cliente->getSenha(), PDO::PARAM_STR);
        $statement->bindValue(5, $cliente->getId(), PDO::PARAM_INT);
        $statement->execute();
    }

    public function excluir(int $id): void
    {
        $sql = "DELETE FROM clientes WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();
    }
}
