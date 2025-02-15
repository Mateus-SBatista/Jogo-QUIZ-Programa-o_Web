<?php
include 'db.php';

if (isset($_GET['id'])) {
    $pergunta_id = $_GET['id'];

    // Excluir a pergunta
    $stmt = $conn->prepare("DELETE FROM perguntas WHERE id = :pergunta_id");
    $stmt->execute(['pergunta_id' => $pergunta_id]);

    // Redirecionar para a página de criação de quiz
    header("Location: criar_quiz.php");
}
?>
