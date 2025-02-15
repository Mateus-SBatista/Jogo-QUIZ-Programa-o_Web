<?php
include 'db.php';

if (isset($_POST['add_categoria'])) {
    $categoria = $_POST['categoria'];
    $stmt = $conn->prepare("INSERT INTO categorias (nome) VALUES (:nome)");
    $stmt->execute(['nome' => $categoria]);
    header("Location: criar_quiz.php");
}

if (isset($_POST['add_pergunta'])) {
    $stmt = $conn->prepare("INSERT INTO perguntas (categoria_id, dificuldade, pergunta, resposta_correta, alternativa_1, alternativa_2, alternativa_3, alternativa_4) VALUES (:categoria_id, :dificuldade, :pergunta, :resposta_correta, :alternativa_1, :alternativa_2, :alternativa_3, :alternativa_4)");
    $stmt->execute([
        'categoria_id' => $_POST['categoria_id'],
        'dificuldade' => $_POST['dificuldade'],
        'pergunta' => $_POST['pergunta'],
        'resposta_correta' => $_POST['correta'],
        'alternativa_1' => $_POST['alternativa_1'],
        'alternativa_2' => $_POST['alternativa_2'],
        'alternativa_3' => $_POST['alternativa_3'],
        'alternativa_4' => $_POST['alternativa_4'],
    ]);
    header("Location: criar_quiz.php");
}
?>
