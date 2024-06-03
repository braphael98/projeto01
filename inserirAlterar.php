<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterado</title>
</head>
<body>
    <?php
        include "cadastro.class.php";

        $id_cliente = $_POST["id_cliente"];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $c = new Cadastro();
        $cliente = $c->selectClienteId($id_cliente);
        foreach($cliente as $cl) {
            $c->setId_cliente($cl['id_cliente']);
            $c->setNome($cl['nome']);
            $c->setTelefone($cl['telefone']);
            $c->setEmail($cl['email']);
            $c->setSenha($cl['senha']);
            $c->setCorte($cl['corte']);
            $c->setBarbeiro($cl['barbeiro']);
            $c->setData($cl['data']);
            $c->setHora($cl['hora']);
        }

        $c->setNome($nome);
        $c->setTelefone($telefone);
        $c->setEmail($email);
        $c->setSenha($senha);

        $c->alterarCliente();
    ?>
    <h5>Dados Salvos</h5>
    <a href="login.php">Retornar</a>
</body>
</html>