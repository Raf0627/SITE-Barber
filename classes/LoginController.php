<?php

class LoginController extends Login
{
    private string $email;
    private string $senha;

    public function __construct(PDO $pdo,string $email, string $senha)
    {
        parent::__construct($pdo);
        $this->email = $email;
        $this->senha = $senha;
    }

    public function loginUser() {
        $this->getUser($this->email,$this->senha);
    }
}
