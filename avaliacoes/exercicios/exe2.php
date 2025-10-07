<?php
// 1. INICIALIZAÇÃO DA SESSÃO
// Deve ser a primeira linha executável para usar $_SESSION
session_start();

// Define o total de cadastros necessários
$total_pessoas = 10;
$status_mensagem = "";

// 2. PROCESSAMENTO DO FORMULÁRIO (ao enviar)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Garante que o vetor de pessoas na sessão existe
    if (!isset($_SESSION['pessoas'])) {
        $_SESSION['pessoas'] = [];
    }

    // Recebe os dados do formulário
    $nome = trim($_POST['nome'] ?? '');
    $cidade = trim($_POST['cidade'] ?? '');
    $idade = intval($_POST['idade'] ?? 0);
    $sexo = $_POST['sexo'] ?? '';

    // Validação básica
    if (!empty($nome) && !empty($cidade) && $idade > 0 && in_array($sexo, ['Masculino', 'Feminino'])) {
        // Armazena a nova pessoa no vetor (array) da Sessão
        $_SESSION['pessoas'][] = [
            'nome' => htmlspecialchars($nome),
            'cidade' => htmlspecialchars($cidade),
            'idade' => $idade,
            'sexo' => $sexo
        ];

        $pessoas_atuais = count($_SESSION['pessoas']);
        $restantes = $total_pessoas - $pessoas_atuais;

        if ($pessoas_atuais < $total_pessoas) {
            $status_mensagem = "Pessoa $pessoas_atuais de $total_pessoas cadastrada. Faltam $restantes.";
        }
    } else {
        $status_mensagem = "Erro na entrada. Por favor, preencha todos os campos corretamente.";
    }
}

// 3. RECUPERAÇÃO E CÁLCULO DOS DADOS
$dados_pessoas = $_SESSION['pessoas'] ?? [];
$pessoas_cadastradas = count($dados_pessoas);
$processamento_finalizado = ($pessoas_cadastradas === $total_pessoas);

// Variáveis para os resultados
$listagem_maiores_18 = [];
$contagem_masculino = 0;

if ($processamento_finalizado) {
    foreach ($dados_pessoas as $pessoa) {
        // 2. Listagem de quem tem mais de 18 anos
        if ($pessoa['idade'] > 18) {
            $listagem_maiores_18[] = $pessoa['nome'];
        }

        // 3. Contagem de pessoas do sexo masculino
        if ($pessoa['sexo'] === 'Masculino') {
            $contagem_masculino++;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Pessoas (Arrays e Sessões)</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .container { max-width: 700px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"], select { width: 100%; padding: 8px; box-sizing: border-box; }
        .status { padding: 10px; background-color: #f0f0f0; border: 1px solid #ccc; margin-top: 10px; }
        .resultado { margin-top: 30px; padding: 20px; border: 2px solid #0056b3; background-color: #e6f7ff; }
        .limpar-btn { display: block; margin-top: 20px; padding: 10px 15px; background-color: #dc3545; color: white; border: none; cursor: pointer; text-decoration: none; text-align: center; }
        .limpar-btn:hover { background-color: #c82333; }
        ul { list-style: disc; padding-left: 20px; }
        h3 { margin-top: 20px; border-bottom: 1px solid #ccc; padding-bottom: 5px; }
    </style>
</head>
<body>
    <?php
       require_once("../../estrutura/header.php");
    ?>
    <div class="container">
        <h1>Cadastro de Pessoas (<?= $pessoas_cadastradas ?> de <?= $total_pessoas ?>)</h1>

        <?php if (!empty($status_mensagem)): ?>
            <div class="status"><?= nl2br($status_mensagem) ?></div>
        <?php endif; ?>

        <?php if (!$processamento_finalizado): ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" required>
                </div>
                <div class="form-group">
                    <label for="idade">Idade:</label>
                    <input type="number" id="idade" name="idade" min="1" max="150" required>
                </div>
                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo" required>
                        <option value="">Selecione...</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </div>
                <button type="submit">Cadastrar Pessoa</button>
            </form>
        <?php else: ?>
            <div class="resultado">
                <h2>Resultado Final do Cadastro</h2>

                <hr>

                <h3>1. Listagem de Nomes e Idades (Total: <?= $pessoas_cadastradas ?>)</h3>
                <ul>
                    <?php foreach ($dados_pessoas as $p): ?>
                        <li><?= $p['nome'] ?> - Idade: <?= $p['idade'] ?> anos</li>
                    <?php endforeach; ?>
                </ul>

                <hr>

                <h3>2. Listagem de Maiores de 18 Anos (Total: <?= count($listagem_maiores_18) ?>)</h3>
                <?php if (empty($listagem_maiores_18)): ?>
                    <p>Nenhuma pessoa cadastrada possui mais de 18 anos.</p>
                <?php else: ?>
                    <ul>
                        <?php foreach ($listagem_maiores_18 as $nome): ?>
                            <li><?= $nome ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <hr>

                <h3>3. Contagem por Sexo</h3>
                <p>Pessoas cadastradas do Sexo Masculino: <?= $contagem_masculino ?></p>
                <p>Pessoas cadastradas do Sexo Feminino: <?= $pessoas_cadastradas - $contagem_masculino ?></p>

            </div>
            <a href="?limpar=true" class="limpar-btn">Iniciar Novo Cadastro</a>
        <?php endif; ?>
    </div>
    <?php
       require_once("../../estrutura/footer.php");
    ?>
</body>
</html>
<?php
// 6. LIMPEZA DA SESSÃO
if (isset($_GET['limpar'])) {
    session_unset();    // Remove todas as variáveis de sessão
    session_destroy();  // Destrói a sessão
    header("Location: exe2.php"); // Redireciona para recomeçar
    exit;
}
?>