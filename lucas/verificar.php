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
            "Senha: " . $c['senha'] . "<br>";
        }

        /*foreach($horario as $h){
            echo "Corte: " . $c['corte'] . "<br>" .
            "Barbeiro: " . $c['barbeiro'] . "<br>" .
            "Data: " . $c['data'] . "<br>" .
            "Horário: " . $c['hora'] . "<br>";
        }*/
    ?>
    <br>
    <form action="novoAgendamento.php" method="post">
        <input type="hidden" name="email" value="<?= $email;?>">
        <input type="hidden" name="senha" value="<?= $senha;?>">
        <input type="submit" value="Novo Agendamento">
        <br>
    </form>
    <form action="alterar.php" method="post">
        <input type="hidden" name="email" value="<?= $email;?>">
        <input type="hidden" name="senha" value="<?= $senha;?>">
        <input type="submit" value="Cancelar agendamento">
        <br>
    </form>
    <form action="alterar.php" method="post">
        <input type="hidden" name="email" value="<?= $email;?>">
        <input type="hidden" name="senha" value="<?= $senha;?>">
        <input type="submit" value="Alterar dados">
        <br>
    </form>
    <a href="./index.html">Retornar</a><br>

</body>
</html>