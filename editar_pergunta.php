<?php
include 'db.php';

if (isset($_GET['id'])) {
    $pergunta_id = $_GET['id'];

    // Buscar a pergunta existente
    $stmt = $conn->prepare("SELECT * FROM perguntas WHERE id = :id");
    $stmt->execute(['id' => $pergunta_id]);
    $pergunta = $stmt->fetch();

    // Verifica se o formulário foi enviado
    if (isset($_POST['edit_pergunta'])) {
        // Recupera os dados do formulário
        $dificuldade = $_POST['dificuldade'];
        $pergunta_texto = $_POST['pergunta'];
        $resposta_correta = $_POST['correta'];
        $alternativa_1 = $_POST['alternativa_1'];
        $alternativa_2 = $_POST['alternativa_2'];
        $alternativa_3 = $_POST['alternativa_3'];
        $alternativa_4 = $_POST['alternativa_4'];

        // Atualiza a pergunta no banco de dados
        $stmt_update = $conn->prepare("UPDATE perguntas SET dificuldade = :dificuldade, pergunta = :pergunta, resposta_correta = :resposta_correta, alternativa_1 = :alternativa_1, alternativa_2 = :alternativa_2, alternativa_3 = :alternativa_3, alternativa_4 = :alternativa_4 WHERE id = :id");
        $stmt_update->execute([
            'dificuldade' => $dificuldade,
            'pergunta' => $pergunta_texto,
            'resposta_correta' => $resposta_correta,
            'alternativa_1' => $alternativa_1,
            'alternativa_2' => $alternativa_2,
            'alternativa_3' => $alternativa_3,
            'alternativa_4' => $alternativa_4,
            'id' => $pergunta_id
        ]);

        // Redireciona de volta para a página de criação do quiz
        header("Location: criar_quiz.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pergunta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #02031b;
            text-align: center;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .quiz-container {
            max-width: 650px;
            background-color: #c1bfbf;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 10px 10px 10px rgba(6, 5, 0.1);
            text-align: center;
        }

        .quiz-title {
            background-color: #2C2C2C;
            color: #ffffff;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            text-align: left;
        }

        input,
        select {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn {
            background-color: #00C853;
            color: #fff;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            margin: 10px auto;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .btn:hover {
            background-color: #00A344;
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <div class="quiz-container">
        <h1 class="quiz-title">Editar Pergunta</h1>
        <form method="POST">
            <label for="dificuldade">Dificuldade:</label>
            <input type="text" name="dificuldade" value="<?= $pergunta['dificuldade'] ?>" required><br><br>

            <label for="pergunta">Pergunta:</label>
            <input type="text" name="pergunta" value="<?= $pergunta['pergunta'] ?>" required><br><br>

            <label for="correta">Resposta Correta:</label>
            <input type="text" name="correta" value="<?= $pergunta['resposta_correta'] ?>" required><br><br>

            <label for="alternativa_1">Alternativa 1:</label>
            <input type="text" name="alternativa_1" value="<?= $pergunta['alternativa_1'] ?>"><br>


            <label for="alternativa_2">Alternativa 2:</label>
            <input type="text" name="alternativa_2" value="<?= $pergunta['alternativa_2'] ?>"><br>


            <label for="alternativa_3">Alternativa 3:</label>
            <input type="text" name="alternativa_3" value="<?= $pergunta['alternativa_3'] ?>"><br>


            <label for="alternativa_4">Alternativa 4:</label>
            <input type="text" name="alternativa_4" value="<?= $pergunta['alternativa_4'] ?>"><br>

            <button type="submit" class="btn" name="edit_pergunta">Salvar Alterações</button>
        </form>
        <br>
        <a href="criar_quiz.php" class="btn">Cancelar</a>
        <a href="index.php" class="btn">Menu</a>
    </div>
</body>

</html>