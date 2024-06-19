<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>

    <?php
    include "cadastro.class.php";
    $c = new Cadastro();
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cliente = $c->selectCliente($email, $senha);
    } else {
        $id_cliente = $_GET['id_cliente'];
        $cliente = $c->selectClienteId($id_cliente);
    }


    if (empty($cliente)) {
        echo "E-mail ou senha invalidos";
    ?>
        <br>
        <a href="login.php">Retornar</a><br>
        <?php
    } else {
        foreach ($cliente as $h) {
        ?>
            <div class="card">
                <div class="card-header">
                    <h3>Visualizar Dados do Usuário: <?php echo ($h['nome']); ?><b></b></h3>
                </div>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Nome:</th>
                            <td><?php echo ($h['nome']); ?></td>
                        </tr>
                        <tr>
                            <th>Telefone:</t>
                            <td><?php echo ($h['telefone']); ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo ($h['email']); ?></td>
                        </tr>
                        <tr>
                            <th>Senha:</th>
                            <td><?php echo ($h['senha']); ?></td>
                        </tr>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php }
        $id = $cliente[0]['id_cliente'];
        $horario = $c->selectAgendamento($id);

        if (empty($horario)) {
            echo "<br>" . "Você não possui agendamentos" . "<br>";
        }

        $b = new Cadastro();

        foreach ($horario as $h) {
        ?>
            <div class="card">
                <div class="card-header">
                    <h3>Barbeiro: <?php echo $b->nome($h['id_barbeiro']); ?><b></b></h3>
                </div>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Corte:</th>
                            <td><?php echo ($h['corte']); ?></td>
                        </tr>
                        <tr>
                            <th>Telefone:</t>
                            <td><?php echo ($h['data']); ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo ($h['hora']); ?></td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
            </div>
        <?php }
        ?>

        <br>
        <form action="agendamento.php" method="post">
            <input type="hidden" name="id_cliente" value="<?= $id ?>">
            <input type="submit" value="Novo Agendamento">
            <br>
        </form>
        <form action="historico.php" method="post">
            <input type="hidden" name="id_cliente" value="<?= $id ?>">
            <input type="submit" value="Ver agendamentos">
            <br>
        </form>
        <form action="alterar.php" method="post">
            <input type="hidden" name="id_cliente" value="<?= $id ?>">
            <input type="submit" value="Alterar dados">
            <br>
        </form>
        <a href="login.php">Retornar</a><br>

    <?php } ?>
</body>

</html>