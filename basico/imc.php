<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cáculo do IMC</title>
    <?php
    function imc($altura, $peso)
    {
        $imc = $peso / ($altura * $altura);
        return $imc;
    }

    function classificaimc($imc)
    {
        /*
            Menor que 18.5 - Abaixo do peso ;
            Entre 18.5 e 24.9 - Peso normal ;
            Entre 25.0 e 29.9 - Pré-obesidade ;
            Entre 30.0 e 34.9 - Obesidade Grau 1 ;
            Entre 35.0 e 39.9 - Obesidade Grau 2 ;
            Acima de 40 - Obesidade Grau 3
          */
        $classificacao = "";
        if ($imc < 18.5) {
            $classicacao = "abaixo do peso ideal.";
        } elseif ($imc >= 18.5 && $imc < 25) {
            $classicacao = "normal.";
        } elseif ($imc >= 25 && $imc < 30) {
            $classicacao = "pré-obesidade.";
        } elseif ($imc >= 30 && $imc < 35) {
            $classicacao = "obesidade grau 1.";
        } elseif ($imc >= 35 && $imc < 40) {
            $classicacao = "obesidade grau 2.";
        } else {
            $classicacao = "obsidade grau 3.";
        }
        return $classicacao;
    }
    ?>
</head>

<body>
    <?php
       require_once("../estrutura/header.php");
    ?>
    <h1>Cáculo do IMC</h1>
    <form action="imc.php" method="POST">
        <label for="inome">Nome:</label>
        <input id="inome" name="inome" type="text">
        <br><br>
        <label for="iidade">Idade:</label>
        <input id="iidade" name="iidade" type="number">
        <br><br>
        <label for="ialtura">Altura:</label>
        <input id="ialtura" name="ialtura" type="text" alt="Informe a atura em metros">
        <br><br>
        <label for="ipeso">Peso:</label>
        <input id="ipeso" name="ipeso" type="text" alt="Informe o pelo em kg">
        <br>
        <br>
        <button type="submit">Calcular</button>
        <br>
        <br>
    </form>
    <?php
    if (
        isset($_POST["inome"]) &&
        isset($_POST["iidade"]) &&
        isset($_POST["ialtura"]) &&
        isset($_POST["ipeso"])
    ) {
        //Print_r exibe todo o conteúdo de um array (vetor) 
        //print_r($_POST); 
        //calcular o IMC
        $nome = $_POST['inome'];
        $idade = $_POST['iidade'];
        $imc = imc($_POST["ialtura"], $_POST["ipeso"]);
        //Mostrar a classificação de peso conforme o IMC
        $classificacao = classificaimc($imc);
        echo "<br>";
        echo "$nome com idade de $idade e IMC de $imc, seu peso está $classificacao";
    } else {
        echo "Atenção! Informe todos os dados";
    }
    ?>
    <?php
       require_once("../estrutura/footer.php");
    ?>

</body>

</html>