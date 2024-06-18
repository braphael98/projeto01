<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendados</title>
</head>

<body>
    <form action="cancelarAgendamento.php" method="POST">
        <?php
        if (!isset($_POST['id_cliente'])) {
            echo "USUARIO NÃO ENCONTRADO";
            exit();
        }
        include "cadastro.class.php";
        $id_cliente = $_POST['id_cliente'];

        $c = new cadastro();
        $horario = $c->selectAgendamento($id_cliente);

        if (empty($horario)) {
            echo "<br>" . "Você não possui agendamentos" . "<br>";
        }

        $b = new Cadastro();
        foreach ($horario as $h) {
            echo "<br>" . "Barbeiro: " . $b->nome($h['id_barbeiro']) . "<br>" .
                "Corte: " . $h['corte'] . "<br>" .
                "Data: " . $h['data'] . "<br>" .
                "Horário: " . $h['hora'] . "<br>";
        ?>
            <input type="checkbox" id="cancelar" name="cancelar[]" value="<?= $h['id_horario'] ?>">
            <label for="cancelar">Cancelar</label>
            <br>
        <?php
        }
        ?>
        <br>
        <input type="hidden" name="id_cliente" value=<?= $id_cliente ?>>
        <input type="submit" value="Cancelar agendamento">
    </form>
    <a href="verificar.php?id_cliente=<?= $id_cliente ?>">Retornar</a>
</body>

</html>