<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Arrays</title>
</head>
<body>
    <?php
        include_once("../estrutura/header.php");
    ?>
    <h1>Exemplo de uso de Arrays</h1>
    <?php 
        $frutas = array("Banana", "Maçã", "Laranja", "Uva");
        echo "<h2>Array de Frutas</h2>";
        echo "<pre>";
        var_dump($frutas);
        echo "</pre>";
        echo "<br>";
        echo "<h2>Segunda fruta da lista</h2>";
        echo "<p>" . $frutas[1] . "</p>";
        echo "<h2>Lista de Frutas</h2>";
        echo "<ul>";
        foreach ($frutas as $fruta) {
            echo "<li>" . $fruta . "</li>";
        }
        echo "</ul>";
        echo "<h2>Lista de Frutas com FOR</h2>";
        echo "<ul>";
        for ($i = count($frutas) - 1; $i >= 0; $i--) {
            echo "<li>" . $frutas[$i] . "</li>";
        }
        echo "</ul>";
        echo "<h2>Lista ordenada de frutas</h2>";
        sort($frutas);
        echo "<ul>";
        foreach ($frutas as $fruta) {
            echo "<li>" . $fruta . "</li>";
        }
        echo "</ul>";
        echo "<h2>Array Associativo</h2>";
        $pessoa[] = array(
            "nome" => "João",
            "idade" => 25,
            "cidade" => "São Paulo"
        ); 
        $pessoa[] = array(
            "nome" => "Maria",
            "idade" => 30,
            "cidade" => "Rio de Janeiro"
        );
        $pessoa[] = array(
            "nome" => "Pedro",
            "idade" => 28,
            "cidade" => "Belo Horizonte"
        );
        echo "<h2>Lista de pessoas</h2>";
        echo "<ul>";
        foreach ($pessoa as $p) {
            echo "<li>" . $p["nome"] . ", " . $p["idade"] . " anos, " . $p["cidade"] . "</li>";
        }
        echo "</ul>";

    ?>
    <?php
        include_once("../estrutura/footer.php");
    ?>
    
</body>
</html>