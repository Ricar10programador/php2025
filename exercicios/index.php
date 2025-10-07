<?php
// index.php

session_start();

// Verifica se a sessão já está ativa (usuário já logado)
if (isset($_SESSION['nome_usuario'])) {
    // Se sim, redireciona para a página de boas-vindas
    header('Location: boas_vindas.php');
    exit;
}

// Inclui o arquivo com as credenciais
require_once 'credenciais.php';

$mensagem_erro = '';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_usuario = $_POST['nome_usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Verifica se o nome de usuário existe no array e a senha corresponde
    if (isset($usuarios[$nome_usuario]) && $usuarios[$nome_usuario] === $senha) {
        // Login bem-sucedido: salva o nome do usuário na sessão
        $_SESSION['nome_usuario'] = $nome_usuario;

        // Redireciona para a página de boas-vindas
        header('Location: boas_vindas.php');
        exit;
    } else {
        $mensagem_erro = 'Nome de usuário ou senha inválidos.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4; }
        .login-box { padding: 40px; border: 1px solid #ddd; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        input { display: block; width: 100%; margin-bottom: 10px; padding: 8px; }
        .error { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <?php if ($mensagem_erro): ?>
            <p class="error"><?= htmlspecialchars($mensagem_erro); ?></p>
        <?php endif; ?>
        <form action="index.php" method="POST">
            <label for="nome_usuario">Nome de Usuário:</label>
            <input type="text" id="nome_usuario" name="nome_usuario" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>