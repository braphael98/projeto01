<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancelar</title>
</head>
<body>
    <?php
        include "cadastro.class.php";
        $id_cliente = $_POST['id_cliente'];
        $horario = new cadastro();
        
        if(isset($_POST['cancelar'])){
            $cancelados = $_POST['cancelar'];
            foreach ($cancelados as $c) {
                $horario->cancelarAgendamento($c);
            }
            echo "Agendamento cancelado" . "<br>";
        } else {
            echo "";
        }
    ?>
    <a href="verificar.php?id_cliente=<?=$id_cliente?>">Retornar</a>
</body>
</html>