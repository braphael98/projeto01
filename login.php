<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class = compact> 
    <form action="verificar.php" method="post">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <button ><a href="cadastro.html">VOLTAR</a></button>
    </div>
</body>
</html>