<?php
session_start();
header('Content-Type: application/json');

require_once 'conexao.php';


$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$stmt = $conn->prepare("SELECT id_usuario, nick, senha, id_ranking, isAdm, foto_id FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($senha, $user['senha'])) {
        $_SESSION['id_usuario'] = $user['id_usuario'];
        $_SESSION['nick']       = $user['nick'];
        $_SESSION['id_ranking'] = $user['id_ranking'];
        $_SESSION['isAdm'] = $user['isAdm'] ?? 0; 
        $_SESSION['foto_id']    = $user['foto_id']; 

        echo json_encode([
            "status" => "ok",
            "msg" => "Login realizado com sucesso!",
            "nick" => $user['nick'],
            "id_ranking" => $user['id_ranking'],
            "isAdm" => $user['isAdm'] // temporário pra debugar
        ]);
    } else {
        echo json_encode(["status"=>"erro","msg"=>"Senha incorreta"]);
    }
} else {
    echo json_encode(["status"=>"erro","msg"=>"Usuário não encontrado"]);
}

$stmt->close();
$conn->close();
