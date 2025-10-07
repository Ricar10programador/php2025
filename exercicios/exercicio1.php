<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício - Introdução - exe1</title>
</head>
<body>
    <?php 
        include("../estrutura/header.php");
        include("../estrutura/menuexe.php");
    ?>
    <h1>Exercício 1</h1>
    <p>1. Crie uma aplicação simples em PHP que crie uma variável com seu nome e outra variável com sua idade e mostre na tela. </p>
    <?php
       $nome = "Sandro Alencar Fernandes";
       $idade = 47;
       echo "Nome: $nome, idade $idade anos.";
?>
    ?>
    <br>
    <?php 
        include("../estrutura/footer.php");
    ?>
</body>
</html>