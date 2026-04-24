<?php
session_start();

require_once 'conexao.php';


// garante que tem usuário logado
if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["status" => "erro", "msg" => "Usuário não está logado."]);
    exit;
}

$idUsuario = $_SESSION['id_usuario'];

// deleta o usuário
$sql = "DELETE FROM usuarios WHERE id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idUsuario);

if ($stmt->execute()) {
    session_destroy();
    echo json_encode(["status" => "ok", "msg" => "Perfil deletado com sucesso!"]);
} else {
    echo json_encode(["status" => "erro", "msg" => "Não foi possível deletar o perfil."]);
}

$stmt->close();
$conn->close();
