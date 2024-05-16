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

    $c->inserirAgendamento();

    $cliente = $c->consultaHorario($barbeiro, $data, $hora);
    if(empty($cliente)){
        echo "<h1> DEU BOM </h1>";
        $c->inserirCliente();
    } else{
        echo "<h1> DEU RUIM </h1>";
    } 
    ?>
</body>
</html>