<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Dado</title>
    <?php 
       function jogardado() {
           $numero = rand(1,6);
           echo "Dado: ".$numero;
           echo "<br>";
           echo "<img src='php2025/img/dado_$numero.png'>";
       }
    ?>
</head>
<body>
    <?php
       require_once("../estrutura/header.php");
    ?>
    <h1>Simulador de Dado</h1>
    <form action="dado.php" method="GET">
        <button name="bsortear" value="sortear">Jogar o Dado</button>        
    </form>
    <br>
    <?php 
       if (isset($_GET["bsortear"])) {
          jogardado();
       }
    ?>
    <?php
       require_once("../estrutura/footer.php");
    ?>
</body>
</html>