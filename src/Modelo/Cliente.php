<?php

class Cliente
{
    private int $id;
    private string $nome;
    private string $telefone;
    private string $email;
    private string $senha;

    public function __construct(int $id, string $nome, string $telefone, string $email, string $senha)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }
}
