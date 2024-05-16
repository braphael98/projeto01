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
            echo "ID: " .$c['id_cliente'] . "<br>" .
            "Nome: " . $c['nome'] . "<br>" . 
            "Telefone: " . $c['telefone'] . "<br>" .
            "E-mail: " . $c['email'] . "<br>" .
            "Senha: " . $c['senha'] . "<br>";
        }

        /*$cliente=$c->selectHorario($email, $senha);
        foreach($cliente as $h){
            echo "Corte: " . $c['corte'] . "<br>" .
            "Barbeiro: " . $c['barbeiro'] . "<br>" .
            "Data: " . $c['data'] . "<br>" .
            "Horário: " . $c['hora'] . "<br>";
        }*/
    ?>
    <br>
    <form action="Agendamento.php" method="post">
        <input type="hidden" name="id_cliente" value="<?= $c['id_cliente']?>">
        <input type="submit" value="Novo Agendamento">
        <br>
    </form>
    <form action="alterar.php" method="post">
        <input type="hidden" name="id_cliente" value="<?= $c['id_cliente']?>">
        <input type="submit" value="Cancelar agendamento">
        <br>
    </form>
    <form action="alterar.php" method="post">
        <input type="hidden" name="id_cliente" value="<?= $c['id_cliente']?>">
        <input type="submit" value="Alterar dados">
        <br>
    </form>
    <a href="login.html">Retornar</a><br>

</body>
</html>