<?php
include 'cadastro.class.php';
$barbeiros = new Cadastro();
$barbeiro = $barbeiros->listaBarbeiros(2);
$id_cliente = $_GET['id']; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <h2>Horarios</h2>
    <hr>
    <table>

        <thead>
            <tr>
                <th>Barbeiro</th>
                <th>Cliente</th>
                <th>Corte</th>
                <th>Data</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($barbeiro as $barber) {
                ?>
                <tr>
                    <td><?php echo $barber['barbeiro']; ?></td>
                    <td><?php echo $barber['cliente']; ?></td>
                    <td><?php echo $barber['corte']; ?></td>
                    <td><?php echo $barber['data']; ?></td>
                    <td><?php echo $barber['hora']; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <a href="verificar.php?id_cliente=<?= $id_cliente ?>">Retornar</a>
</body>

</html>

