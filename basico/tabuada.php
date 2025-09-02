<!DOCTYPE html>
<html lang="pt-br
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo Tabuada</title>
</head>
<body>
    <h1>Gerar a tabuada de 0 até 10 de um número</h1>
    <form action="tabuada.php" method="get">
        Número: <input type="number" name="numero" required>
        <br><br>
        <input type="submit" value="Gerar Tabuada">
    </form>
    <br>
    <h2>Utilizando FOR</h2>
    <?php
    if (isset($_GET["numero"])) {
        $numero = $_GET["numero"];
        echo "<br>";
        echo "<h2>Tabuada do número ". $numero ."</h2>";
        for ($i = 0; $i <= 10; $i++) {
            $resultado = $numero * $i;
            echo "$numero x $i = $resultado<br>";
        }
    }
    ?>  
    <h2>Utilizando WHILE</h2>
    <?php
    if (isset($_GET["numero"])) {
        $numero = $_GET["numero"];
        echo "<br>";
        echo "<h2>Tabuada do número ". $numero ."</h2>";
        $i = 10;
        while ($i >= 0) {
            $resultado = $numero * $i;
            echo "$numero x $i = $resultado<br>";
            $i--;
        }
    }
    ?>
</body>
</html>