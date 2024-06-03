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

        foreach($cliente as $cl) {
            echo "Nome: " . $cl['nome'] . "<br>" . 
            "Telefone: " . $cl['telefone'] . "<br>" .
            "E-mail: " . $cl['email'] . "<br>" .
            "Senha: " . $cl['senha'] . "<br>";
        }

        $id = $cliente[0]['id_cliente'];
        $horario=$c->selectAgendamento($id);
        foreach($horario as $h){
            echo "<br>" . "Barbeiro: " . $h['barbeiro'] . "<br>" .
            "Corte: " . $h['corte'] . "<br>" .
            "Data: " . $h['data'] . "<br>" .
            "Horário: " . $h['hora'] . "<br>";
        }
    ?>
    <br>
    <form action="Agendamento.php" method="post">
        <input type="hidden" name="id_cliente" value="<?= $id?>">
        <input type="submit" value="Novo Agendamento">
        <br>
    </form>
    <form action="CancelarAgendamento.php" method="post">
        <input type="hidden" name="id_cliente" value="<?= $id?>">
        <input type="submit" value="Cancelar agendamento">
        <br>
    </form>
    <form action="alterar.php" method="post">
        <input type="hidden" name="id_cliente" value="<?= $id?>">
        <input type="submit" value="Alterar dados">
        <br>
    </form>
    <a href="login.php">Retornar</a><br>

</body>
</html>