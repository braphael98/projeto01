<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar</title>
</head>
<body>
    <?php
        include "cadastro.class.php";
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $c = new Cadastro();
        $cliente=$c->selectCliente($email, $senha);

        foreach($cliente as $c) {
            echo "Nome: " . $c['nome'] . "<br>" . 
            "Telefone: " . $c['telefone'] . "<br>" .
            "E-mail: " . $c['email'] . "<br>" .
            "Senha: " . $c['senha'] . "<br>" .
            "Corte: " . $c['corte'] . "<br>" .
            "Barbeiro: " . $c['barbeiro'] . "<br>" .
            "Data: " . $c['data'] . "<br>" .
            "Horário: " . $c['hora'] . "<br>";
        }
    ?>
    <br>
    <a href="novoAgendamento.php">Novo agendamento</a><br>
    <a href="cancelar.php">Cancelar agendamento</a><br>
    <form action="alterar.php" method="post">
        <input type="hidden" name="email" value="<?= $email;?>">
        <input type="hidden" name="senha" value="<?= $senha;?>">
        <input type="submit" value="Alterar dados">
        <br>
    </form>
    <a href="./index.html">Retornar</a><br>

</body>
</html>