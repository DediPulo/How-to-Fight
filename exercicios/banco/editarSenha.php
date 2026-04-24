<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'conexao.php';


if (!isset($_SESSION['id_usuario'])) {
    die("Usuário não está logado.");
}

$userId     = $_SESSION['id_usuario'];
$senhaAtual = $_POST['senhaAtual'];
$novaSenha  = $_POST['novaSenha'];

// buscar hash da senha atual no banco
$stmt = $conn->prepare("SELECT senha FROM usuarios WHERE id_usuario = ?");
if (!$stmt) {
    die("Erro na query SELECT: " . $conn->error);
}
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($hash);
$stmt->fetch();
$stmt->close();

if (!$hash) {
    die("Usuário não encontrado.");
}

// validar senha atual
if (password_verify($senhaAtual, $hash)) {
    $novoHash = password_hash($novaSenha, PASSWORD_DEFAULT);
    $update = $conn->prepare("UPDATE usuarios SET senha = ? WHERE id_usuario = ?");
    $update->bind_param("si", $novoHash, $userId);

    if ($update->execute()) {
        echo json_encode(["status"=>"ok","msg"=>"Senha atualizada com sucesso!"]);
    } else {
        echo json_encode(["status"=>"erro","msg"=>"Erro ao atualizar senha"]);
    }
} else {
    echo json_encode(["status"=>"erro","msg"=>"Senha atual incorreta!"]);
}

$conn->close();
?>
