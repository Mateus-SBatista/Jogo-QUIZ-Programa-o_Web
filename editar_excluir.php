<?php include 'db.php'; ?>
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
            max-width:none;
            background-color: #c1bfbf;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 10px 10px 10px rgba(6, 5, 0.1);
            text-align:justify;
            justify-items:auto;
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
        .btn-danger {
            background-color: #FF4C4C;
        }
        .btn-danger:hover {
            background-color: #FF3333;
        }
        .btn-edit {
            background-color: #4CAF50;
        }
        .btn-edit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="quiz-container">
        <h1 class="quiz-title">Editar Quiz</h1>
        
        <h2>Categorias</h2>
        <?php
        $stmt = $conn->query("SELECT * FROM categorias");
        while ($row = $stmt->fetch()) {
            echo "<div><span>" . $row['nome'] . "</span> 
            <a href='editar_categoria.php?id=" . $row['id'] . "' class='btn btn-edit'>Editar</a>
            <a href='excluir_categoria.php?id=" . $row['id'] . "' class='btn btn-danger'>Excluir</a></div>";
        }
        ?>
        
        <h2>Perguntas</h2>
        <?php
        $stmt = $conn->query("SELECT * FROM perguntas");
        while ($row = $stmt->fetch()) {
            echo "<div><span>" . $row['pergunta'] . "</span> 
            <a href='editar_pergunta.php?id=" . $row['id'] . "' class='btn btn-edit'>Editar</a>
            <a href='excluir_pergunta.php?id=" . $row['id'] . "' class='btn btn-danger'>Excluir</a></div>";
        }
        ?>
        <br>
        <a href="index.php" class="btn">Menu</a>
    </div>
    
</body>
</html>
