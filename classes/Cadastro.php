<?php

class Cadastro {
    
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function setUser($nome,$telefone,$email,$senha) {
        $statement = $this->pdo->prepare('INSERT INTO clientes (nome,telefone,email,senha) VALUES (?,?,?,?)');

    $hashedSenha = password_hash($senha,PASSWORD_DEFAULT);

        if(!$statement->execute(array($nome,$hashedSenha,$email))) {
            $statement= null;
            echo "<p>E-mail já cadastrado em outro usuário<p/>";
            exit();
        }

        $statement = null;
    }

    public function checkEmail($email) {
        $statement = $this->pdo->prepare('SELECT email FROM clientes WHERE email = ? ');
        if(!$statement->execute(array($email))) {
            $statement= null;
            echo "<p>E-mail já cadastrado em outro usuário<p/>";
            exit();
        }

        $resultCheck;
        if ($statement->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;    
    }
}