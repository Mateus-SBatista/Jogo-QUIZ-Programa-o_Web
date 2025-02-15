<?php
include 'db.php';

$respostas_usuario = $_POST['resposta'];
$acertos = 0;
$perguntas = [];
$total_perguntas = 0; // Variável para armazenar o total de perguntas

foreach ($respostas_usuario as $id_pergunta => $resposta_usuario) {
    // Pega a pergunta e a resposta correta do banco
    $stmt = $conn->prepare("SELECT * FROM perguntas WHERE id = :id");
    $stmt->execute(['id' => $id_pergunta]);
    $pergunta = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Inicializa o status da pergunta
    $pergunta['status'] = ''; // Define o status como vazio por padrão

    // Verifica se a resposta do usuário está correta
    if ($resposta_usuario == $pergunta['resposta_correta']) {
        $acertos++;
        $pergunta['status'] = 'acertou'; // Marca como acertado
    } else {
        $pergunta['status'] = 'errou'; // Marca como errado
    }

    // Armazena a resposta do usuário
    $pergunta['resposta_usuario'] = $resposta_usuario;
    
    // Adiciona a pergunta ao array de perguntas
    $perguntas[] = $pergunta;
    $total_perguntas++; // Incrementa o total de perguntas
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Quiz</title>
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

        .quiz-form-container {
            background-color: #c1bfbf;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
            text-align: left;
        }

        p {
            font-size: 18px;
            margin: 10px 0;
            font-weight: bold;
            color: #2C2C2C;
        }

        .acertou {
            background-color: #00C853;
            color: white;
        }

        .errou {
            background-color: #f44336;
            color: white;
        }

        .correta {
            background-color: #007bff;
            color: white;
        }

        .errada {
            background-color: #ffeb3b;
            color: #000;
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
            margin-top: 20px;
        }

        button:hover {
            background-color: #00A344;
            transform: scale(1.05);
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
    <div class="quiz-form-container">
        <h2>Resultado do Quiz</h2>

        <?php foreach ($perguntas as $index => $pergunta): ?>
            <p>
                <?= $index + 1 ?>. <?= $pergunta['pergunta'] ?>
            </p>
            <div>
                <?php 
                // Verificar as alternativas e exibir a cor correspondente
                foreach (['resposta_correta', 'alternativa_1', 'alternativa_2', 'alternativa_3', 'alternativa_4'] as $key):
                    if (!empty($pergunta[$key])):
                        // Verifica se o usuário escolheu essa alternativa
                        $class = '';

                        if ($pergunta['resposta_usuario'] == $pergunta[$key]) {
                            if ($pergunta[$key] == $pergunta['resposta_correta']) {
                                $class = 'acertou'; // Resposta correta
                            } else {
                                $class = 'errada'; // Resposta errada selecionada
                            }
                        } elseif ($pergunta[$key] == $pergunta['resposta_correta']) {
                            $class = 'correta'; // Exibe a resposta correta
                        } else {
                            $class = 'errou'; // Exibe alternativa errada
                        }
                ?>
                    <p class="<?= $class ?>">
                        <?= $pergunta[$key] ?>
                    </p>
                <?php 
                    endif; 
                endforeach; 
                ?>
            </div>
        <?php endforeach; ?>

        <h3><?= $acertos ?> / <?= $total_perguntas ?> respostas corretas</h3>

        <br>
        <a href="index.php" class="btn">Início</a>
    </div>
    
</body>
</html>
