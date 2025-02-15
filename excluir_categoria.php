<?php
include 'db.php';

if (isset($_GET['id'])) {
    $categoria_id = $_GET['id'];

    // Excluir perguntas associadas à categoria
    $stmt_perguntas = $conn->prepare("DELETE FROM perguntas WHERE categoria_id = :categoria_id");
    $stmt_perguntas->execute(['categoria_id' => $categoria_id]);

    // Excluir a categoria
    $stmt_categoria = $conn->prepare("DELETE FROM categorias WHERE id = :categoria_id");
    $stmt_categoria->execute(['categoria_id' => $categoria_id]);

    // Redirecionar para a página de criação de quiz
    header("Location: criar_quiz.php");
}
?>
