<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro clientes</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th>Corte</th>
                <th>Barbeiro</th>
                <th>Data</th>
                <th>Horário</th>
            </tr>    
        </thead>
        <tbody>
            <?php  
                include "cadastro.class.php";
                $c = new Cadastro();
                $clientes = $c->listaClientes();
                foreach($clientes as $cliente) {
            ?>
            <tr>
                <td><?php echo $cliente['id_cliente'] ?></td>
                <td><?php echo $cliente['nome']?></td>
                <td><?php echo $cliente['telefone']?></td>
                <td><?php echo $cliente['email']?></td>
                <td><?php echo $cliente['senha']?></td>
                <td><?php echo $cliente['corte']?></td>
                <td><?php echo $cliente['barbeiro']?></td>
                <td><?php echo $cliente['data']?></td>
                <td><?php echo $cliente['hora']?></td>
            </tr>
            <?php } ?>
        </tbody>    
    </table>
    
</body>
</html>