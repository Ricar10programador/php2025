<?php 
  // Iniciando o uso de sessões
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Sessões</title>
</head>
<body>
    <?php 
       require_once("../estrutura/header.php");
    ?>
       <form action="index.php" method="GET">
           <label for="inome">Nome:</label>
           <input type="text" name="inome" id="inome">
           <br>
           <label for="icor">Selecione uma cor:</label>
           <input type="color" name="icor" id="icor">
           <button name="benviar" id="benviar">Enviar</button>
       </form>
       <?php 
          if (isset($_GET["inome"]) &&
              isset($_GET["icor"])) {
              $_SESSION["nome"] = $_GET["inome"];
              $_SESSION["cor"] = $_GET["icor"];
              echo "OK! Informações salvas na sessão.";
          } else {
            echo "ATENÇÃO ! Informe nome e cor";
          }
          if (isset($_SESSION["nome"]) &&
              isset($_SESSION["cor"])) {
                ?> 
                   <br> 
                   <br>
                   <button onclick="window.location.href='sessao.php'">Consulta Sessão</button>
                <?php
              }
       ?>
    <?php 
       require_once("../estrutura/footer.php");
    ?>
</body>
</html>