<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>
</head>
<body>
    <h1>Exercício 2</h1>
    <p>Envie seu nome e idade pelo formulário abaixo:</p>
    <form action="exercicio2.php" method="get">
        Nome: <input type="text" name="nome" required>
        <br><br>
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