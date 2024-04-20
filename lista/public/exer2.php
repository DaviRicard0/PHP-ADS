<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encontrar Menor Valor</title>
</head>
<body>
    <h2>Encontrar o Menor Valor</h2>
    <form action="/php/bootstrap.php/exer2/resposta" method="post">
        <?php
            for ($i = 0; $i < 7; $i++) {
                echo '<label for="numero' . $i . '">Número ' . ($i + 1) . ':</label>';
                echo '<input type="number" name="numeros[]" id="numero' . $i . '" required><br>';
            }
        ?>
        <button type="submit">Encontrar Menor Valor</button>
    </form>
</body>
</html>