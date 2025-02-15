<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Quiz</title>
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
        <h1 class="quiz-title">Criar Novo Quiz</h1>
        
        <form action="salvar_quiz.php" method="POST">
            <label for="categoria">Nova Categoria:</label>
            <input type="text" name="categoria" required>
            <button type="submit" class="btn" name="add_categoria">Adicionar Categoria</button>
        </form>

        <h3>Adicionar Perguntas</h3>
        <form action="salvar_quiz.php" method="POST">
            <label for="categoria">Categoria:</label>
            <select name="categoria_id" id="categoria">
                <?php
                $stmt = $conn->query("SELECT * FROM categorias");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                }
                ?>
            </select>
            <label for="dificuldade">Dificuldade:</label>
            <select name="dificuldade">
                <option value="facil">Fácil</option>
                <option value="medio">Médio</option>
                <option value="dificil">Difícil</option>
            </select>
            <label for="pergunta">Pergunta:</label>
            <input type="text" name="pergunta" required>
            <label for="correta">Resposta Correta:</label>
            <input type="text" name="correta" required>
            <label for="alternativa_1">Alternativa 1:</label>
            <input type="text" name="alternativa_1">
            <label for="alternativa_2">Alternativa 2:</label>
            <input type="text" name="alternativa_2">
            <label for="alternativa_3">Alternativa 3:</label>
            <input type="text" name="alternativa_3">
            <label for="alternativa_4">Alternativa 4:</label>
            <input type="text" name="alternativa_4">
            <button type="submit" class="btn" name="add_pergunta">Adicionar Pergunta</button>
        </form>
        <br>
        <a href="jogar.php" class="btn">Jogar</a>
        <a href="index.php" class="btn">Menu</a>
    </div>
</body>

</html>