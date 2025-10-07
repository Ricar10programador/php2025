<?php
$litros_necessarios = null;
$custo_total_combustivel = null;
$custo_total_pedagios = null;
$custo_total_viagem = null;
$erro = null;

if (isset($_GET['limpar'])) {
    header("Location: exe3.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $distancia = floatval($_POST['distancia'] ?? 0);
    $preco_combustivel = floatval($_POST['preco_combustivel'] ?? 0);
    $consumo_medio = floatval($_POST['consumo_medio'] ?? 0);
    $numero_pedagios = intval($_POST['numero_pedagios'] ?? 0);
    $custo_medio_pedagio = floatval($_POST['custo_medio_pedagio'] ?? 0);

    if ($distancia <= 0 || $preco_combustivel <= 0 || $consumo_medio <= 0) {
        $erro = "Por favor, preencha a Distância, o Preço do Combustível e o Consumo Médio com valores positivos.";
    } else {
        
        //litros de combustível necessários
        $litros_necessarios = $distancia / $consumo_medio;
        
        //custo total do combustível
        $custo_total_combustivel = $litros_necessarios * $preco_combustivel;
        
        //custo total dos pedágios
        $custo_total_pedagios = $numero_pedagios * $custo_medio_pedagio;
        
        //custo total da viagem
        $custo_total_viagem = $custo_total_combustivel + $custo_total_pedagios;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Custo de Viagem - PHP</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 500px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="number"] { width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .actions { display: flex; justify-content: space-between; gap: 10px; }
        button, .reset-btn { padding: 10px 15px; border-radius: 4px; cursor: pointer; flex-grow: 1; text-align: center; text-decoration: none; }
        .calculate-btn { background-color: #007bff; color: white; border: none; }
        .calculate-btn:hover { background-color: #0056b3; }
        .reset-btn { background-color: #6c757d; color: white; border: none; line-height: 1.4; }
        .reset-btn:hover { background-color: #5a6268; }
        .resultado { margin-top: 20px; padding: 15px; border: 1px solid #28a745; background-color: #d4edda; color: #155724; border-radius: 4px; }
        .erro { margin-top: 20px; padding: 15px; border: 1px solid #dc3545; background-color: #f8d7da; color: #721c24; border-radius: 4px; }
        .valor { font-weight: bold; color: #000; }
        h2 { border-bottom: 2px solid #ccc; padding-bottom: 10px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <?php
       require_once("../../estrutura/header.php");
    ?>
    <div class="container">
        <h1>Calculadora de Custo de Viagem</h1>

        <h2>Dados da Viagem</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="distancia">Distância da viagem (km):</label>
                <input type="number" id="distancia" name="distancia" step="any" min="0" required 
                       value="<?= isset($_POST['distancia']) ? htmlspecialchars($_POST['distancia']) : '' ?>">
            </div>
            <div class="form-group">
                <label for="preco_combustivel">Preço do combustível por litro (R$):</label>
                <input type="number" id="preco_combustivel" name="preco_combustivel" step="0.01" min="0" required
                       value="<?= isset($_POST['preco_combustivel']) ? htmlspecialchars($_POST['preco_combustivel']) : '' ?>">
            </div>
            <div class="form-group">
                <label for="consumo_medio">Consumo médio do veículo (km/litro):</label>
                <input type="number" id="consumo_medio" name="consumo_medio" step="any" min="0.1" required
                       value="<?= isset($_POST['consumo_medio']) ? htmlspecialchars($_POST['consumo_medio']) : '' ?>">
            </div>
            <div class="form-group">
                <label for="numero_pedagios">Número de pedágios:</label>
                <input type="number" id="numero_pedagios" name="numero_pedagios" step="1" min="0" required
                       value="<?= isset($_POST['numero_pedagios']) ? htmlspecialchars($_POST['numero_pedagios']) : '0' ?>">
            </div>
            <div class="form-group">
                <label for="custo_medio_pedagio">Custo médio por pedágio (R$):</label>
                <input type="number" id="custo_medio_pedagio" name="custo_medio_pedagio" step="0.01" min="0" required
                       value="<?= isset($_POST['custo_medio_pedagio']) ? htmlspecialchars($_POST['custo_medio_pedagio']) : '0.00' ?>">
            </div>
            <div class="actions">
                <button type="submit" class="calculate-btn">Calcular Custo</button>
                <a href="?limpar=true" class="reset-btn">Reiniciar</a>
            </div>
        </form>

        <?php if ($erro): ?>
            <div class="erro">
                <?= $erro ?>
            </div>
        <?php elseif ($custo_total_viagem !== null): ?>
            <div class="resultado">
                <h2>Custo Estimado da Viagem</h2>
                
                <p>Distância Total: <span class="valor"><?= number_format($distancia, 0, ',', '.') ?> km</span></p>

                <hr>
                
                <h3>Detalhes do Combustível</h3>
                <p>Litros de combustível necessários: <span class="valor"><?= number_format($litros_necessarios, 2, ',', '.') ?> L</span></p>
                <p>Custo total do combustível: <span class="valor">R$ <?= number_format($custo_total_combustivel, 2, ',', '.') ?></span></p>

                <hr>

                <h3>Detalhes dos Pedágios</h3>
                <p>Número de pedágios: <span class="valor"><?= number_format($numero_pedagios, 0, ',', '.') ?></span></p>
                <p>Custo total dos pedágios: <span class="valor">R$ <?= number_format($custo_total_pedagios, 2, ',', '.') ?></span></p>

                <hr>

                <h3>Custo Total da Viagem</h3>
                <p>O custo total da sua viagem é: <span class="valor">R$ <?= number_format($custo_total_viagem, 2, ',', '.') ?></span></p>
            </div>
        <?php endif; ?>
    </div>
    <br>
    <?php
       require_once("../../estrutura/footer.php");
    ?>
</body>
</html>