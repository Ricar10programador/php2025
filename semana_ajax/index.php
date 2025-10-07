<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retornar dia da semana</title>
</head>
<body>
    <?php
        include_once("../estrutura/header.php");
    ?>
    <h1>Retornar dia da semana</h1>

    <form id="formSemana">
        <label for="dia">Digite um número (1-7):</label>
        <input type="number" id="dia" name="dia" min="1" max="7" required>
        <button type="submit">Verificar Dia</button>
    </form>
    <div id="resultado"></div>

    <script>
        document.getElementById('formSemana').addEventListener('submit', function(e) {
            e.preventDefault();
            const dia = document.getElementById('dia').value;
            fetch('semana.php?dia=' + encodeURIComponent(dia))
                .then(response => response.text())
                .then(data => {
                    document.getElementById('resultado').innerHTML = 'O dia da semana é: ' + data;
                })
                .catch(() => {
                    document.getElementById('resultado').innerHTML = 'Erro ao buscar o dia.';
                });
        });
    </script>
    <?php
        include_once("../estrutura/footer.php");
    ?>
</body>
</html>