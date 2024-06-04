<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento</title>
</head>
<body>
    <?php
        include "cadastro.class.php";
        $id_cliente = $_POST['id_cliente'];
        $corte = $_POST['corte'];
        $barbeiro = $_POST['barbeiro'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];

        $c = new cadastro();

        $c->setId_cliente($id_cliente);
        $c->setCorte($corte);
        $c->setBarbeiro($barbeiro);
        $c->setData($data);
        $c->setHora($hora);

        $horario = $c->consultarHorario($barbeiro, $data, $hora);
        if(empty($horario)){
            $c->inserirAgendamento();
            echo "Agendado com sucesso";
            ?>
            <br>
            <a href="agendamento.php">Retornar</a>
            <?php
        } else {
            echo "Não foi possível agendar pois o horário já está preenchido";
            ?>
            <br>
            <a href="agendamento.php">Retornar</a>
            <?php
        } 
    ?>
</body>
</html>