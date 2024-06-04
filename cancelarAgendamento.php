<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "cadastro.class.php";
        $id_cliente = $_POST['id_cliente'];
        $cancelados = $_POST['cancelar'];
        $horario = new cadastro();
        
        foreach ($cancelados as $c) {
            $horario->cancelarAgendamento($c);
        }
        echo "Agendamento cancelado". "<br>";
    ?>
    <form action="historico.php" method="post">
        <input type="hidden" name="id_cliente" value=<?=$id_cliente?>>
        <input type=submit value="Retornar">
    </form>

    <a href="verificar.php?id_cliente=<?php echo $id_cliente; ?>">Voltar</a>
</body>
</html>