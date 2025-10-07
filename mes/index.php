<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício mês</title>
</head>
<body>
    <?php
    include_once("../estrutura/header.php");
    ?>
   <!-- Formulário solicitando número que represen um mês - de 1 até 12 -->    
   <form action="index.php" method="GET">
       <label for="inmes">Número do mês:</label>
       <input type="number" min="1" max="12" name="inmes" id="inmes">
       <br>
       <button name="benviar" id="benviar">Enviar</button>
   </form> 
   <!-- Verificar se foi passado o número mês para consultar o seu nome correspondente -->    
   <?php
   
      require_once("mes.php");
      if (isset($_GET["inmes"])) {
        //consultar e mostrar o nome mês
        echo "<p></p>O mês informado ".$_GET["inmes"]." corresponde ao mês de ".mes($_GET["inmes"])."</p>";
      }
       include_once("../estrutura/footer.php");
   ?> 
</body>
</html>