<?php
// boas_vindas.php

session_start();

// Verifica se a sessão do usuário existe
if (!isset($_SESSION['nome_usuario'])) {
    // Se não, redireciona para a página de login
    header('Location: index.php');
    exit;
}

$nome_usuario = $_SESSION['nome_usuario'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo!</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #e9e9e9; flex-direction: column; }
        .welcome-box { text-align: center; padding: 30px; border: 1px solid #ccc; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .welcome-message { font-size: 1.5em; color: #333; }
        .logout-link { margin-top: 20px; text-decoration: none; color: #007bff; border: 1px solid #007bff; padding: 8px 16px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="welcome-box">
        <p class="welcome-message">Olá, **<?= htmlspecialchars($nome_usuario); ?>**! Bem-vindo(a) à sua área logada.</p>
        <a class="logout-link" href="logout.php">Sair</a>
    </div>
</body>
</html>
Passo 4: O arquivo de logout (logout.php)
Este arquivo é responsável por destruir a sessão do usuário, removendo o nome que foi salvo.

PHP

<?php
// logout.php

session_start();

// Limpa todas as variáveis da sessão
$_SESSION = [];

// Se você usa cookies de sessão, eles também precisam ser destruídos.
// Isso destrói o cookie de sessão.
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params['path'], $params['domain'],
        $params['secure'], $params['httponly']
    );
}

// Destrói a sessão
session_destroy();

// Redireciona para a página de login
header('Location: index.php');
exit;