<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
</head>
<body>
    <form action="alterado.php" method="POST">
        <?php
            include "cadastro.class.php";
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $c = new Cadastro();
            $cliente = $c->selectCliente($email, $senha);
            foreach($cliente as $c) {
        ?>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?= $c['nome'];?>" required pattern="[a-zA-Z]+">
        <br>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="<?= $c['telefone'];?>" required pattern="[0-9]{9,11}">
        <br>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="<?= $c['email'];?>" required>
        <br>
        <label for="senha">Senha</label>
        <input type="text" id="senha" name="senha" value="<?= $c['senha'];?>" required minlength="5">
        <br>
        <?php } ?>
        <input type="hidden" name="emailVelho" value="<?= $email;?>">
        <input type="hidden" name="senhaVelha" value="<?= $senha;?>">
        <input type="submit" value="Confirmar">
    </form>
</body>
</html>