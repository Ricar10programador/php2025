<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retornar dia da semana</title>
</head>
<body>
    <?php
        include_once("../estrutura/header.php");
    ?>
    <h1>Retornar dia da semana</h1>
    <?php 
        function diaSemana($dia) {
            $dias = array(
                1 => "Domingo",
                2 => "Segunda-feira",
                3 => "Terça-feira",
                4 => "Quarta-feira",
                5 => "Quinta-feira",
                6 => "Sexta-feira",
                7 => "Sábado"
            );
            return $dias[$dia] ?? "Dia inválido";
        }
    ?>
    <form action="index.php" method="post">
        <label for="dia">Digite um número (1-7):</label>
        <input type="number" id="dia" name="dia" min="1" max="7" required>
        <button type="submit">Verificar Dia</button>
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dia = intval($_POST["dia"]);
            echo "<p>O dia da semana é: " . diaSemana($dia) . "</p>";
        }
        include_once("../estrutura/footer.php");
    ?>
</body>
</html>