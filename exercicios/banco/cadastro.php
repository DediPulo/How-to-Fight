<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nick  = $_POST['nick'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $hash  = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO usuarios (nick, email, senha, id_ranking) VALUES (?, ?, ?, 1)");
    $stmt->bind_param("sss", $nick, $email, $hash);    

    if ($stmt->execute()) {
        echo json_encode(["status"=>"ok","msg"=>"Usuário cadastrado com sucesso!"]);
    } else {
        echo json_encode(["status"=>"erro","msg"=>$stmt->error]);
    }

$stmt->close();
$conn->close();
}
?>
