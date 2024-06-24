<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Agendamento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
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
                        <h1 class="text-center">Olá <?= $c['nome'] ?></h1>

                        <div class="form-group">
                            <label for="corte">Escolha o tipo de corte:</label>
                            <select class="form-control" name="corte" id="corte" onchange="mostrarImagem()" required>
                                <option value="Barba e Cabelo">Opção 1 - Barba e Cabelo</option>
                                <option value="Corte Simples">Opção 2 - Corte Simples</option>
                                <option value="Mullet">Opção 3 - Mullet</option>
                                <option value="Corte Americano">Opção 4 - Americano</option>
                                <option value="Corte Neymar 2012">Opção 5 - Neymar 2012</option>
                                <option value="Bigode Estilo Dick Vigarista">Opção 6 - Bigode Estilo Dick Vigarista</option>
                                <option value="Bigode Leoncio">Opção 7 - Bigode Leoncio</option>
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <img id="imagemSelecionada" class="img-fluid mt-2" src="src/img1.jpg" width="400 px">
                        </div>
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
                                    case "Corte Americano":
                                        imagem.src = "src/img4.jpg";
                                        break;
                                    case "Corte Neymar 2012":
                                        imagem.src = "src/neymar.jpg";
                                        break;
                                    case "Bigode Estilo Dick Vigarista":
                                        imagem.src = "src/img5.jpg";
                                        break;
                                    case "Bigode Leoncio":
                                        imagem.src = "src/img6.jpg";
                                        break;    
                                    default:
                                        imagem.src = "";
                                }
                            }
                        </script>

                        <div class="form-group">
                            <label for="barbeiro">Selecione o barbeiro de sua preferência:</label>
                            <select class="form-control" name="barbeiro" id="barbeiro" onchange="mostrarImagemBarbeiro()" required>
                                <option value="1">Zé</option>
                                <option value="2">Jonas</option>
                                <option value="3">Mariano</option>
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <img id="barbeiroSelecionado" class="img-fluid mt-2" src="src/zé.jpg">
                        </div>
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

                        <div class="form-group">
                            <label for="data">Data de preferência:</label>
                            <input type="date" class="form-control" name="data" id="data" required>
                        </div>

                        <div class="form-group">
                            <label for="hora">Escolha um horário:</label>
                            <select class="form-control" name="hora" id="hora" required>
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
                        </div>

                        <div class="text-center">
                            <h3>Consulte os horários de nossos barbeiros:</h3>
                            <a class="btn btn-primary mr-2" href="zeHorarios.php?id=<?= $id_cliente ?>">Zé</a>
                            <a class="btn btn-primary mr-2" href="jonasHorarios.php?id=<?= $id_cliente ?>">Jonas</a>
                            <a class="btn btn-primary" href="marianoHorarios.php?id=<?= $id_cliente ?>">Mariano</a>
                        </div>

                        <input type="hidden" name="id_cliente" value="<?= $c['id_cliente'] ?>">
                        <button type="submit" class="btn btn-success btn-block mt-4">Confirmar</button>
                    <?php } ?>
                </form>
                <a href="verificar.php?id_cliente=<?= $id_cliente ?>" class="btn btn-secondary btn-block mt-2">Retornar</a>
            </div>
        </div>
    </div>
</body>

</html>