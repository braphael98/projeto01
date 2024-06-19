<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Agendamentos</h2>
        <form action="cancelarAgendamento.php" method="POST">
            <?php
            if (!isset($_POST['id_cliente'])) {
                echo "<p class='text-danger'>Não Possui Agendamentos</p>";
                exit();
            }
            include "cadastro.class.php";
            $id_cliente = $_POST['id_cliente'];

            $c = new cadastro();
            $horario = $c->selectAgendamento($id_cliente);

            if (empty($horario)) {
                echo "<p>Você não possui agendamentos</p>";
            }

            $b = new Cadastro();
            foreach ($horario as $h) {
                ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-text">
                            Barbeiro: <?= $b->nome($h['id_barbeiro']) ?><br>
                            Corte: <?= $h['corte'] ?><br>
                            Data: <?= $h['data'] ?><br>
                            Horário: <?= $h['hora'] ?><br>
                        </p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="cancelar" name="cancelar[]" value="<?= $h['id_horario'] ?>">
                            <label class="form-check-label" for="cancelar">Cancelar</label>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <input type="hidden" name="id_cliente" value="<?= $id_cliente ?>">
            <button type="submit" class="btn btn-danger">Cancelar Agendamento</button>
            <a href="verificar.php?id_cliente=<?= $id_cliente ?>" class="btn btn-secondary">Retornar</a>
        </form>
    </div>
</body>

</html>
