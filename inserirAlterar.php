<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterado</title>
</head>

<body>
    <?php
    if (!isset($_POST['id_cliente'])) {
        echo "USUARIO NÃO ENCONTRADO";
        exit();
    }
    include "cadastro.class.php";

    $id_cliente = $_POST['id_cliente'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $c = new Cadastro();
    $c->setId_cliente($id_cliente);
    $c->setNome($nome);
    $c->setTelefone($telefone);
    $c->setEmail($email);
    $c->setSenha($senha);

    $c->alterarCliente();
    ?>
    <h3>Dados Salvos</h3>
    <a href="login.php">Retornar</a>
</body>

</html>