<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Data</title>
</head>
<body>
  <?php
       require_once("../estrutura/header.php");
    ?>
    <h1>Exemplo de Data em PHP</h1>
    <?php
      //mostrar a data atual no formato dia/mes/ano
      date_default_timezone_set("America/Sao_Paulo"); 
      echo "Data atual: " . date("d/m/Y");
      echo "<br>";
      echo "Data e hora atual: " . date("d/m/Y H:i:s");
      echo "<br>";
      echo "Dia da semana (numérico): " . date("N");
      echo "<br>";
      echo "Nome do mês: " . date("F");
      echo "<br>";
      echo "Ano com 2 dígitos: " . date("y");
      echo "<br>";
      echo "Ano com 4 dígitos: " . date("Y");
      $agora = new DateTime();
      echo "<br>";  
      echo "Data e hora atual com DateTime: " . $agora->format("d/m/Y H:i:s");
      echo "<br>";
    ?>
    <?php
       require_once("../estrutura/footer.php");
    ?>
</body>
</html>