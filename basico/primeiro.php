<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conceitos Básicos PHP</title>
</head>
<body>
    <h1>
        <?php 
           echo "Olá! Eu sou um script PHP rodando no servidor!"
        ?>
    </h1>
    <p>Abaixo trazemos um código gerado no servidor pelo PHP</p>
    <?php 
       echo "<h2>Server-side Script com PHP</h2>";
       echo "<br>";
       date_default_timezone_set("America/Sao_Paulo");
       echo "Data e hora da execução: " . date("H:i:s d/m/Y");
    ?>
    <script language="javascript">
        document.write("<h2>Script do lado do cliente com JavaScript</h2>");
        document.write("<p>Este é um script que roda no navegador do usuário.</p>");
        document.write("<p>Data e hora local: " + new Date().toLocaleString() + "</p>");
    </script> 
</body>
</html>