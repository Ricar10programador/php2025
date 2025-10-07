<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com Mês</title>
</head>
<body>
    <?php 
       require_once("../../estrutura/header.php");
       if (isset($_SESSION["usuario"])) {
        echo "Olá <bold>".$_SESSION["usuario"]."</bold> bem vindo á sua página";
        echo "<br>";
        ?>
          <button onclick="location.href='sair.php'">Sair</button>
        <?php
       } else {
    ?>
    <div>
    <form action="login.php" method="POST">
        <label for="iusuario">Usuário: </label>
        <input type="text" name="iusuario" id="iusuario">
        <br><br>
        <label for="isenha">Senha: </label>
        <input type="password" name="isenha" id="isenha">
        <br>
        <br>
        <button type="submit">Conectar</button>
        <br>
    </form>
    <br>
    </div>
    <br>   
   <form action="avaliameslogin.php" method="GET">
       <label for="inmies">Número do mês:</label>
       <input type="number" min="1" max="12" name="inmies" id="inmies">
       <br>
       <button name="benviar" id="benviar">Enviar</button>
   </form>  
   <?php
   
      require_once("mies.php");
      if (isset($_GET["inmies"])) {
        echo "<p></p>O mês informado ".$_GET["inmies"]." corresponde ao mês de ".mies($_GET["inmies"])."</p>";
      }
       require_once("../../estrutura/footer.php");
    }
   ?> 
</body>
</html>