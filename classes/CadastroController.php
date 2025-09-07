<?php

class CadastroController extends Cadastro
{
    private string $nome;
    private string $telefone;
    private string $email;
    private string $senha;
    private string $senhaRpt;

    public function __construct(PDO $pdo, string $nome, string $telefone, string $email, string $senha, string $senhaRpt)
    {
        parent::__construct($pdo);
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->senha = $senha;
        $this->senhaRpt = $senhaRpt;
    }

    public function cadastrarUser() {
        if($this->mesmaSenha() == false) {
            
            echo "<p>Senhas diferentes<p/>";
            exit();
        }
        if($this->emailCadastrado() == false) {
            
            echo "<p>E-mail já cadastrado em outro usuário<p/>";
            exit();
        }

        $this->setUser($this->nome,$this->telefone,$this->email,$this->senha);
    }

    private function mesmaSenha() {
        $result;
        if ($this->senha !== $this->senhaRpt) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function emailCadastrado() {
        $result;
        if (!$this->checkEmail($this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}
