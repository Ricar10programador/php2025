<?php
      session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limpar dados da Sessão</title>
</head>
<body>
    <?php
        require_once("../estrutura/header.php");
        session_unset();
        session_destroy();
    ?>
    <p style="text-align: center;">Limpar dados da sessão e redirecionar para a página inicial em 5 segundos...</p>
    <script>
        setTimeout(() => {
            window.location.href = 'index.php';
        }, 5000);
    </script>
    <?php
        require_once("../estrutura/footer.php");
    ?>
</body>
</html>