<?php
include 'db.php';
$categoria = $_GET['categoria'];
$dificuldade = $_GET['dificuldade'];

$stmt = $conn->prepare("SELECT * FROM perguntas WHERE categoria_id = :categoria AND dificuldade = :dificuldade LIMIT 5");
$stmt->execute(['categoria' => $categoria, 'dificuldade' => $dificuldade]);
$perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Embaralha as perguntas
shuffle($perguntas);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <style>
        /* Estilos gerais */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #02031b;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
        }

        form {
            background-color:  #c1bfbf;
            border-radius: 8px;
            padding: 20px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2b8a3e;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        label {
            font-size: 16px;
            margin-bottom: 10px;
            display: inline-block;
            font-weight: bold;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            width: 100%;
            margin-top: 20px;
            font-weight: bold;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Estilos das alternativas */
        input[type="radio"]:checked+label {
            color: #4CAF50;
            font-weight: bold;
        }

        /* Estilos de erro e acerto */
        .correct {
            background-color: #4CAF50;
            color: white;
            padding: 5px;
            border-radius: 4px;
        }

        .incorrect {
            background-color: #f44336;
            color: white;
            padding: 5px;
            border-radius: 4px;
        }

        .selected {
            background-color: #ffeb3b;
            color: black;
            padding: 5px;
            border-radius: 4px;
        }

        input[type="radio"]:disabled {
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <form action="resultado.php" method="POST">
        <?php foreach ($perguntas as $index => $pergunta): ?>
            <p><?= $index + 1 ?>. <?= $pergunta['pergunta'] ?></p>

            <?php
            // Cria um array com todas as alternativas
            $alternativas = [
                'resposta_correta' => $pergunta['resposta_correta'],
                'alternativa_1' => $pergunta['alternativa_1'],
                'alternativa_2' => $pergunta['alternativa_2'],
                'alternativa_3' => $pergunta['alternativa_3'],
                'alternativa_4' => $pergunta['alternativa_4']
            ];

            // Filtra as alternativas vazias (se houver)
            $alternativas = array_filter($alternativas);

            // Embaralha as alternativas
            shuffle($alternativas);
            ?>

            <?php foreach ($alternativas as $alternativa): ?>
                <input type="radio" name="resposta[<?= $pergunta['id'] ?>]" value="<?= $alternativa ?>">
                <?= $alternativa ?><br>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <button type="submit">Finalizar</button>
    </form>
</body>

</html>