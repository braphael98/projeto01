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
        $c = new Cadastro();
        if(isset($_POST['email']) && $_POST['senha']){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $cliente=$c->selectCliente($email, $senha);
        } else if ($_GET['id_cliente']) {
            $id_cliente = $_GET['id_cliente'];
            $cliente=$c->selectClienteId($id_cliente);
        }

        
        if(empty($cliente)){
            echo "E-mail ou senha invalidos";
            ?>
            <br>
            <a href="login.php">Retornar</a><br>
            <?php
        } else {
            foreach($cliente as $cl) {
                echo "Nome: " . $cl['nome'] . "<br>" . 
                "Telefone: " . $cl['telefone'] . "<br>" .
                "E-mail: " . $cl['email'] . "<br>" .
                "Senha: " . $cl['senha'] . "<br>";
            }
    
            $id = $cliente[0]['id_cliente'];
            $horario=$c->selectAgendamento($id);

            if(empty($horario)){

                echo "<br>"."Você não possui agendamentos"."<br>";
            }
    
            foreach($horario as $h){
                echo "<br>" . "Barbeiro: " . $h['barbeiro'] . "<br>" .
                "Corte: " . $h['corte'] . "<br>" .
                "Data: " . $h['data'] . "<br>" .
                "Horário: " . $h['hora'] . "<br>";
            }
        
    ?>

    <br>
    <form action="agendamento.php" method="post">
        <input type="hidden" name="id_cliente" value="<?= $id?>">
        <input type="submit" value="Novo Agendamento">
        <br>
    </form>
    <form action="historico.php" method="post">
        <input type="hidden" name="id_cliente" value="<?= $id?>">
        <input type="submit" value="Ver agendamentos">
        <br>
    </form>
    <form action="alterar.php" method="post">
        <input type="hidden" name="id_cliente" value="<?= $id?>">
        <input type="submit" value="Alterar dados">
        <br>
    </form>
    <a href="login.php">Retornar</a><br>
<?php } ?>
</body>
</html>