<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 3</title>
</head>
<body>
    <h1>Exercício 3</h1>
    <form action="exercicio3.php" method="get">
        Nome: <input type="text" name="nome" required>
        <br><br>
        Data de Nascimento: <input type="date" name="data" required>
        <br><br>
        <input type="submit" value="Enviar">
        </form>
        <?php
            if (isset($_GET["data"]) && isset($_GET["nome"])) {
            echo "<br>";    
            $data = new DateTime($_GET["data"]);
            $nome = $_GET["nome"];
            $hoje = new DateTime();
            $idade = $hoje->diff($data)->y;
            echo "<h2>Dados Recebidos<h2>";
            echo "Nome: " . $nome;
            echo "<br>";
            echo "Idade: " . $idade . " anos, ";
            if ($idade >= 18){
                echo "maior de idade";
            }    
            else {
                echo "menor de idade";
            }
        }
        ?>
</body>
</html>