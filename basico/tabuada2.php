<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada 2 - Uso de Função</title>
    <?php 
       function tabuada($numero, $ate) {
          echo "Tabuada de $numero de 0 até $ate <br>";
          for ($i=0; $i <= $ate; $i++) {
            $resultado = $i * $numero;
            echo "$i x $numero = $resultado <br>";
          }
       }
    
    ?>
</head>
<body>
   <?php
       require_once("../estrutura/header.php");
    ?>
    <form action="tabuada2.php" method="POST">
        <label for="itabuada">Informe o número que deseja a Tabuada:</label>
        <input type="number" id="itabuada" name="itabuada">
        <br><br>
        <label for="itabuadaate">Informe número de até quanto deseja a Tabuada:</label>
        <input type="number" id="itabuadaate" name="itabuadaate">
        <br>
        <input type="submit" value="Gerar">
    </form>
    <br>
    <?php
       if (isset($_POST["itabuada"]) && isset($_POST["itabuadaate"])) {
          $numero = $_POST["itabuada"];
          $ate = $_POST["itabuadaate"];
          tabuada($numero,$ate);
          echo "Tabuada do número inferior ao informado<br>";
          tabuada($numero-1,$ate);
          echo "Tabuada do número superior ao informado ao informado<br>";
          tabuada($numero+1,$ate);

        } else {
         echo "Atenção: Importante informar todos os campos";
       }

    ?>
<?php
       require_once("../estrutura/footer.php");
    ?>

</body>
</html>