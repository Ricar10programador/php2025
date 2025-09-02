<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebendo Valores GET</title>
</head>
<body>
    <h1>Recebendo Valores por GET</h1>
    <p>Envie seu nome e idade pelo formulário abaixo:</p>
    <form action="get.php" method="get">
        Nome: <input type="text" name="nome" required>
        <br>
        Idade: <input type="number" name="idade" required>
        <br><br>
        <input type="submit" value="Enviar">
        </form>
        <?php
            if (isset($_GET["nome"]) && isset($_GET["idade"])){
                $nome = $_GET["nome"];
                $idade = $_GET["idade"];
                echo "<h2>Dados Recebidos<h2>";
                echo "Nome: " . $nome;
                echo "<br>";
                echo "Idade: " . $idade;
            }
            ?>
</body>
</html>