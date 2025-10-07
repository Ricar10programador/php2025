<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados da sessão</title>
</head>
<body>
    <?php
      require_once("../estrutura/header.php"); 
      if (isset($_SESSION["nome"]) &&
          isset($_SESSION["cor"])) {
            ?>
            <p>
            Olá <?=$_SESSION["nome"]?>, cor escolhida: 
            <span style='background-color: <?=$_SESSION["cor"]?>; padding: 15px;'>
                <span style='background-color: white; color:black; padding: 3px;'>
                    <?=$_SESSION["cor"]?>
                </span>
            </span>
            </p>
            <br>
            <button onclick="window.location.href='limpar.php'">Limpar Sessão</button>
            <?php
          } else {
            header("Location: index.php");
          }
      require_once("../estrutura/footer.php"); 
    ?>
    
</body>
</html>