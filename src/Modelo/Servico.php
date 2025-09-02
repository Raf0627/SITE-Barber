<?php

class Servico
{
    private ?int $id;
    private string $nome;
    private string $tempo;
    private float $preco;
    private string $imagem;

    public function __construct(?int $id, string $nome, string $tempo, float $preco, string $imagem = 'barberMb.jpg')
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->tempo = $tempo;
        $this->preco = $preco;
        $this->imagem = $imagem;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getTempo(): string
    {
        return $this->tempo;
    }

    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function getImagemDiretorio(): string
    {
        return './imgs/' . $this->imagem;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getPrecoFormatado(): string
    {
        return 'R$' . number_format($this->preco, 2);
    }
}
