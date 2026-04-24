<?php
session_start();

require_once 'conexao.php';


if (!isset($_SESSION['id_usuario'])) {
    die("Usuário não está logado.");
}

$userId = $_SESSION['id_usuario'];

// Trava se não selecionou nenhum ícone
if (empty($_POST['foto_id'])) {
    header("Location: ../perfil.php?msg=Selecione um ícone antes de salvar.&type=erro&aba=icone");
    exit;
}

$fotoId = intval($_POST['foto_id']);

$stmt = $conn->prepare("UPDATE usuarios SET foto_id = ? WHERE id_usuario = ?");
$stmt->bind_param("ii", $fotoId, $userId);

if ($stmt->execute()) {
    $_SESSION['foto_id'] = $fotoId; // atualiza sessão também
    header("Location: ../perfil.php?msg=Foto atualizada&type=sucesso");
} else {
    header("Location: ../perfil.php?msg=Erro ao atualizar foto&type=erro");
}

$stmt->close();
$conn->close();
?>
