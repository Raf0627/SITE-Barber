<?php

class ClienteRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function opcoesClientes(): array
    {
        $sql1 = "SELECT * FROM clientes ORDER BY nome ASC";
        $statement = $this->pdo->query($sql1);
        $clientes = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosClientes = array_map(function ($cliente) {
            return new Cliente(
                $cliente['id'],
                $cliente['nome'],
                $cliente['email'],
                $cliente['senha']
            );
        }, $clientes);

        return $dadosClientes;
    }
}
