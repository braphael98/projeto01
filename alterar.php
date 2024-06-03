<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
</head>
<body>
    <form action="inserirAlterar.php" method="POST">
        <?php
            include "cadastro.class.php";
            $id_cliente = $_POST['id_cliente'];

            $c = new Cadastro();
            $cliente = $c->selectClienteId($id_cliente);
            foreach($cliente as $c) {
        ?>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?= $c['nome'];?>" required>
        <br>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="<?= $c['telefone'];?>" required pattern="[0-9]{9,11}">
        <br>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="<?= $c['email'];?>" required>
        <br>
        <label for="senha">Senha</label>
        <input type="text" id="senha" name="senha" value="<?= $c['senha'];?>" required minlength="5" maxlength="20">
        <br>
        <?php } ?>
        <input type="hidden" name="id_cliente" value="<?= $id_cliente;?>">
        <input type="submit" value="Confirmar">
    </form>
</body>
</html>