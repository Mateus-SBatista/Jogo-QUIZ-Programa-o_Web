
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Game</title>
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
        .btn {
            display: inline-block;
            background-color: #00C853;
            color: #fff;
            padding: 10px 20px;
            border-radius: 25px; 
            text-decoration: none;
            font-weight: bold;
            margin: 10px;
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
        <h1 class="quiz-title">Bem-vindo ao Quiz</h1>
        <a href="jogar.php" class="btn">Jogar</a>
        <a href="criar_quiz.php" class="btn">Criar Novo Quiz</a>
        <a href="editar_excluir.php" class="btn">Editar / Excluir</a>
        
    </div>
</body>
</html>
