<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo Variável em PHP</title>
</head>
<body>
    <h1>Variáveis em PHP</h1>
    <?php
    echo "<h3>Variável STRING(texto)</h3>";
    $nome = "Maria da Siva";
    echo "Nome: " . $nome;
    //O ponto(.) é usado para concatenar(juntar) textos
    echo "<br>";
     echo "<h3>Variável INTEIRO</h3>";
    $idade = 26;
    echo "Idade: " . $idade;
    echo "<br>";
     echo "<h3>Variável FLOAT(número com vírgula)</h3>";
    $peso = 65.5;
    echo "Peso: " . $peso . " kg";
    echo "<br>";
    echo "<h1>Constantes em PHP</h1>";
    //definindo uma constante
    define("idioma", "Português");
    ?>    

</body>
</html>