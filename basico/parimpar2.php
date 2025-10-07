<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Par ou Ímpar 2 - Com Função</title>
    <?php 
       function parimpar($numero) {
           if (($numero % 2) == 0) {
            return "par";
           } else {
            return "ímpar";
           }
       }
    ?>
</head>
<body>
    <?php
       require_once("../estrutura/header.php");
    ?>
    <h1>Informar se número é par ou ímpar</h1>
    <p>Esta aplicação informar se o número é par ou ímpar</p>
    <br>
    <form method="POST" action="parimpar2.php">
        <label for="inumero">Número:</label>
        <input type="number" id="inumero" name="inumero">
        <br>
        <button type="submit">Enviar</button>
    </form>
    <?php 
       if (isset($_POST["inumero"])) {
          $numero = $_POST['inumero']; 
          echo "O $numero é ".parimpar($numero);
       } else {
          echo "Atenção! Informe o número.";
       }
    ?>
    <?php
       require_once("../estrutura/footer.php");
    ?>
</body>
</html>