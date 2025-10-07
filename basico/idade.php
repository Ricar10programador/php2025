<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Idade</title>
</head>
<body>
    <?php
       require_once("../estrutura/header.php");
    ?>
    <h1>Calcular Idade em Anos, Meses e Dias</h1>
    <form action="idade.php" method="get">
        Data de Nascimento: <input type="date" name="data_nascimento" required>
        <br><br>
        <input type="submit" value="Calcular Idade">
    </form>
    <br>
    <?php
        date_default_timezone_set('America/Sao_Paulo');
        if (isset($_GET["data_nascimento"])) {
            echo "<br>";    
            $data_nascimento = new DateTime($_GET["data_nascimento"]);
            $hoje = new DateTime();
            $idade = $hoje->diff($data_nascimento);
            echo "Idade: " . $idade->y . " anos, " . $idade->m . " meses e " . $idade->d . " dias.";
        }
    ?>
    <?php
       require_once("../estrutura/footer.php");
    ?>
</body>
</html>