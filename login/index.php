<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com seção</title>
</head>
<body>
    <?php 
       require_once("../estrutura/header.php");
       if (isset($_SESSION["usuario"])) {
        // usuário informado
        echo "Olá <bold>".$_SESSION["usuario"]."</bold> seja bem vindo a sua área restrita";
        echo "<br>";
        ?>
          <button onclick="location.href='sair.php'">Sair</button>
        <?php
       } else {
    ?>
    <div style="display:flexbox; width: 50%;margin: auto">
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
    <?php
       } //if testa usuário na seção
       require_once("../estrutura/footer.php");
    ?>
</body>
</html>