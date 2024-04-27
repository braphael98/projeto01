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
    $corte = $_POST['corte'];
    $barbeiro = $_POST['barbeiro'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];

    $c = new Cadastro();
    $c->setNome($nome);
    $c->setTelefone($telefone);
    $c->setEmail($email);
    $c->setSenha($senha);
    $c->setCorte($corte);
    $c->setBarbeiro($barbeiro);
    $c->setData($data);
    $c->setHora($hora);

    $c->inserirCliente();
    ?>
    <h1>Cadastro realizado com sucesso</h1>
    <a href="./index.html">Retornar</a>
</body>
</html>