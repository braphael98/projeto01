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

    $corte = $_POST['corte'];
    $barbeiro = $_POST['barbeiro'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];

    $c = new agendamento();

    $c->setNome($nome);
    $c->setTelefone($telefone);
    $c->setEmail($email);
    $c->setSenha($senha);

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