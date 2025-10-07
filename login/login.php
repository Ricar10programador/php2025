<?php
   session_start();
   include_once("../estrutura/header.php");
   if (isset($_POST["iusuario"]) 
      && isset($_POST["isenha"])) {
      require_once("dados.php");
      if (($_POST["iusuario"] == usuario) && ($_POST["isenha"] == senha)) {
        $_SESSION["usuario"] = $_POST["iusuario"];
        header("location: index.php");         
      } else {
        echo "<div>ERRO! Usuário ou senha inválidos</div>";
      }
   } else {
      echo "<div>ERRO! Usuário ou senha informados</div>";
   }
   include_once("../estrutura/footer.php");
