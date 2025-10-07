<?php
session_start();

$total_alunos = 10;
$status_mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (!isset($_SESSION['alunos'])) {
        $_SESSION['alunos'] = [];
    }


    $nome = trim($_POST['nome']);
    $nota = floatval($_POST['nota']);

    if (!empty($nome) && $nota >= 0 && $nota <= 10) {
     
        $_SESSION['alunos'][] = [
            'nome' => htmlspecialchars($nome), 
            'nota' => $nota
        ];

        $alunos_atuais = count($_SESSION['alunos']);
        $restantes = $total_alunos - $alunos_atuais;

        if ($alunos_atuais < $total_alunos) {
            $status_mensagem = "Aluno $alunos_atuais de $total_alunos inserido. Faltam $restantes.";
        }
    } else {
        $status_mensagem = "Erro na entrada. Por favor, preencha o nome e uma nota válida (0 a 10).";
    }
}

$dados_alunos = $_SESSION['alunos'] ?? [];
$alunos_inseridos = count($dados_alunos);
$processamento_finalizado = ($alunos_inseridos === $total_alunos);

$media_classe = 0;
$aluno_maior_nota = "Nenhum";
$maior_nota = -1;

if ($alunos_inseridos > 0) {
    $soma_notas = 0;

    foreach ($dados_alunos as $aluno) {
        $soma_notas += $aluno['nota'];

        // encontra o aluno com a maior nota
        if ($aluno['nota'] > $maior_nota) {
            $maior_nota = $aluno['nota'];
            $aluno_maior_nota = $aluno['nome'];
        }
    }

    $media_classe = $soma_notas / $alunos_inseridos;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Alunos e Média (PHP)</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; }
        .status { padding: 10px; background-color: #f0f0f0; border: 1px solid #ccc; margin-top: 10px; }
        .resultado { margin-top: 30px; padding: 20px; border: 2px solid #007bff; background-color: #e6f7ff; }
        .limpar-btn { display: block; margin-top: 20px; padding: 10px 15px; background-color: #dc3545; color: white; border: none; cursor: pointer; text-decoration: none; text-align: center; }
        .limpar-btn:hover { background-color: #c82333; }
        .disabled { background-color: #6c757d; cursor: not-allowed; }
    </style>
</head>
<body>
   <?php
       require_once("../../estrutura/header.php");
    ?>
    <div class="container">
        <h1>Cadastro de Alunos (<?= $alunos_inseridos ?> de <?= $total_alunos ?>)</h1>

        <?php if (!empty($status_mensagem)): ?>
            <div class="status"><?= nl2br($status_mensagem) ?></div>
        <?php endif; ?>

        <?php if (!$processamento_finalizado): ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nome">Nome do Aluno:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="nota">Nota (0 a 10):</label>
                    <input type="number" id="nota" name="nota" step="0.1" min="0" max="10" required>
                </div>
                <button type="submit">Adicionar Aluno</button>
            </form>
        <?php else: ?>
            <div class="resultado">
                <h2>Cálculo Final da Turma</h2>
                <p>Total de alunos processados: <?= $alunos_inseridos ?></p>
                <hr>
                <h3>Média de Nota da Classe: <?= number_format($media_classe, 2, ',', '.') ?></h3>
                <p>Aluno(a) com a Maior Nota:</p>
                <ul>
                    <li><?= $aluno_maior_nota ?> (Nota: <?= number_format($maior_nota, 2, ',', '.') ?>)</li>
                </ul>
            </div>
            <a href="?limpar=true" class="limpar-btn">Iniciar Novo Cadastro</a>
        <?php endif; ?>

        <?php if ($alunos_inseridos > 0 && !$processamento_finalizado): ?>
            <h3>Alunos Inseridos (<?= $alunos_inseridos ?>):</h3>
            <ul>
                <?php foreach ($dados_alunos as $a): ?>
                    <li><?= $a['nome'] ?> - Nota: <?= number_format($a['nota'], 1, ',', '.') ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <?php
       require_once("../../estrutura/footer.php");
    ?>
</body>
</html>
<?php
if (isset($_GET['limpar'])) {
    session_unset();    
    session_destroy();  
    header("Location: exe1.php"); 
    exit;
}
?>
