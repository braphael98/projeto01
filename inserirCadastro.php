<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro realizado</title>
</head>
<body>
    <?php
    
    include "cadastro.class.php";

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    

    $c = new Cadastro();

    $c->setNome($nome);
    $c->setTelefone($telefone);
    $c->setEmail($email);
    $c->setSenha($senha);
    
    $c->inserirCliente();
    ?>
    <h1>Cadastro realizado com sucesso</h1>
    <a href="login.php">Login</a>
</body>
</html>