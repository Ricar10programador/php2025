<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo Par ou Ímpar</title>
</head>
<body>
    <?php
       require_once("../estrutura/header.php");
    ?>
    <h1>Verificar se um número é Par ou Ímpar</h1>
    <form action="parimpar.php" method="get">
        Número: <input type="number" name="numero" required>
        <br><br>
        <input type="submit" value="Verificar">
    </form>
    <br>
    <?php
     if (isset($_GET["numero"])){
                $numero = $_GET["numero"];
                if (($numero % 2)== 0) {
                    echo "O número ". $numero ." é Par.";
                } else {
                    echo "O número ". $numero ." é Ímpar.";
                }
            }
            ?>
            <?php
       require_once("../estrutura/footer.php");
    ?>
</body>
</html>