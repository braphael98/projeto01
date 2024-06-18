<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Agendamento</title>
    <link rel="stylesheet" href="style.css">
    <style>
        img {
            max-width: 300px;
            max-height: 300px;
        }

        label {
            text-align: left;
        }
    </style>
</head>

<body>
    <form action="inserirAgendamento.php" method="POST">
        <?php
        if (!isset($_POST['id_cliente'])) {
            header("Location: login.php");
        }
        include "cadastro.class.php";
        $id_cliente = $_POST['id_cliente'];

        $c = new Cadastro();
        $cliente = $c->selectClienteId($id_cliente);
        foreach ($cliente as $c) {
        ?>
            <h1>Olá <?= $c['nome'] ?></h1>

            <div>
                <center><select name="corte" id="corte" onchange="mostrarImagem()" required></center>
                <option value="Barba e Cabelo">Opção 1 - Barba e Cabelo</option>
                <option value="Corte Simples">Opção 2 - Corte Simples</option>
                <option value="Mullet">Opção 3 - Mullet </option>
                </select>
                <img id="imagemSelecionada" style="width: 300px;" src="src/img1.jpg">
                <script>
                    function mostrarImagem() {
                        var select = document.getElementById("corte");
                        var imagem = document.getElementById("imagemSelecionada");
                        var valorCorte = select.options[select.selectedIndex].value;
                        switch (valorCorte) {
                            case "Barba e Cabelo":
                                imagem.src = "src/img1.jpg";
                                break;
                            case "Corte Simples":
                                imagem.src = "src/img2.jpg";
                                break;
                            case "Mullet":
                                imagem.src = "src/img3.jpg";
                                break;
                            default:
                                imagem.src = "";
                        }
                    }
                </script>
            </div>
            <label for="barbeiro" style="box-shadow: 0px 0px 10px 0px #777777;">
                <h3 style="font-size: 13pt; margin: 1px;">Selecione o barbeiro de sua preferência</h3>
            </label>

            <div>
                <label for="barbeiro" style="box-shadow: 0px 0px 10px 0px #3f3f3f;">Barbeiro</label>
                <select name="barbeiro" id="barbeiro" onchange="mostrarImagemBarbeiro()" required>
                    <option value="1">Zé</option>
                    <option value="2">Jonas</option>
                    <option value="3">Mariano</option>
                </select>
                <img id="barbeiroSelecionado" src="src/zé.jpg">
                <script>
                    function mostrarImagemBarbeiro() {
                        var select = document.getElementById("barbeiro");
                        var imagem = document.getElementById("barbeiroSelecionado");
                        var barbeiroSelect = select.options[select.selectedIndex].value;
                        switch (barbeiroSelect) {
                            case "1":
                                imagem.src = "src/zé.jpg";
                                break;
                            case "2":
                                imagem.src = "src/jonasBarbeiro.jpg";
                                break;
                            case "3":
                                imagem.src = "src/marianoBarbeiro.jpg";
                                break;
                            default:
                                imagem.src = "";
                        }
                    }
                </script>
                <label for="data" style="box-shadow: 0px 0px 10px 0px #3f3f3f;">Data de preferência</label>
                <input type="date" name="data" id="data" required>
                <label for="hora" style="box-shadow: 0px 0px 10px 0px #3f3f3f;">Escolha um Horario:</label>
                <select name="hora" id="hora" required>
                    <option value="09:00">09:00</option>
                    <option value="09:30">09:30</option>
                    <option value="10:00">10:00</option>
                    <option value="10:30">10:30</option>
                    <option value="11:00">11:00</option>
                    <option value="11:30">11:30</option>
                    <option value="13:30">13:30</option>
                    <option value="14:00">14:00</option>
                    <option value="14:30">14:30</option>
                    <option value="15:00">15:00</option>
                    <option value="15:30">15:30</option>
                    <option value="16:00">16:00</option>
                    <option value="16:30">16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                </select>
                <h3>Consulte os horarios de nossos barbeiros</h3>
                <button><a href="zeHorarios.php?id=<?= $id_cliente?>">Zé</a></button>
                <button><a href="jonasHorarios.php?id=<?= $id_cliente?>">Jonas</a></button>
                <button><a href="marianoHorarios.php?id=<?= $id_cliente?>">Mariano</a></button>
                <br>
                <br>
            <?php } ?>
            <input type="hidden" name="id_cliente" value="<?= $c['id_cliente'] ?>">
            <input type="submit" value="Confirmar">
    </form>
    <a href="verificar.php?id_cliente=<?= $id_cliente ?>">Retornar</a>

</body>

</html>