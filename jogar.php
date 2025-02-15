<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha Categoria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #02031b;
            color: #fff;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            background-color: #c1bfbf;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: left;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #2C2C2C;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #2C2C2C;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 20px;
        }

        button {
            width: 100%;
            background-color: #00C853;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
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
            transform: scale(1.05);
        }

        button:hover {
            background-color: #00A344;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Escolha uma Categoria</h2>
        <form action="quiz.php" method="GET">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria">
                <?php
                $stmt = $conn->query("SELECT * FROM categorias");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                }
                ?>
            </select>
            <label for="dificuldade">Dificuldade:</label>
            <select name="dificuldade" id="dificuldade">
                <option value="facil">Fácil</option>
                <option value="medio">Médio</option>
                <option value="dificil">Difícil</option>
            </select>
            <button type="submit">Iniciar Quiz</button>
            
        </form>
        <br>
        <a href="index.php"><button>Menu</button></a>
        
    </div>
</body>
</html>
