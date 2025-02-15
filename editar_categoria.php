<?php
include 'db.php';

if (isset($_GET['id'])) {
    $categoria_id = $_GET['id'];

    // Buscar a categoria existente
    $stmt = $conn->prepare("SELECT * FROM categorias WHERE id = :id");
    $stmt->execute(['id' => $categoria_id]);
    $categoria = $stmt->fetch();

    // Verifica se o formulário foi enviado
    if (isset($_POST['edit_categoria'])) {
        $novo_nome = $_POST['categoria'];

        // Atualiza o nome da categoria no banco de dados
        $stmt_update = $conn->prepare("UPDATE categorias SET nome = :nome WHERE id = :id");
        $stmt_update->execute(['nome' => $novo_nome, 'id' => $categoria_id]);

        // Redireciona de volta para a página principal
        header("Location: criar_quiz.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
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
        <h1 class="quiz-title">Editar Categoria</h1>
        <form method="POST">
            <label for="categoria">Novo Nome da Categoria:</label>
            <input type="text" name="categoria" value="<?= $categoria['nome'] ?>" required><br><br>
            <button type="submit" class="btn" name="edit_categoria">Salvar Alterações</button>
        </form>
        <br>
        <a href="criar_quiz.php" class="btn">Cancelar</a>
        <a href="index.php" class="btn">Menu</a>
    </div>
</body>

</html>