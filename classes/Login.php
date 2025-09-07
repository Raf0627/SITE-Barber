<?php

class Login {
    
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUser($email, $senha)
{
    // Step 1: Prepare a query to get all necessary user data at once.
    $statement = $this->pdo->prepare('SELECT id, nome, senha FROM clientes WHERE email = ?');

    // Step 2: Execute the query with only the email.
    if (!$statement->execute([$email])) {
        // Handle database query execution error
        $statement = null;
        echo "<p>An error occurred. Please try again later.<p/>";
        exit();
    }

    // Step 3: Check if a user with that email was found.
    if ($statement->rowCount() == 0) {
        $statement = null;
        echo "<p>User not found.<p/>";
        exit();
    }

    // Step 4: Fetch the user's data.
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $hashedSenha = $user['senha'];

    // Step 5: Verify the provided password against the hashed password from the database.
    $checkSenha = password_verify($senha, $hashedSenha);

    // Step 6: If the password is correct, start the session and store user data.
    if ($checkSenha == true) {
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
    } else {
        // If the password is incorrect.
        $statement = null;
        echo "<p>Incorrect password.<p/>";
        exit();
    }

    $statement = null;
}
}