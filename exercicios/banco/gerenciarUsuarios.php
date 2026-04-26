<?php
session_start();
header('Content-Type: application/json');

require_once 'conexao.php';

if (!isset($_SESSION['isAdm']) || $_SESSION['isAdm'] != 1) {
    echo json_encode(["status" => "erro", "msg" => "Acesso negado."]);
    exit;
}

$acao = $_POST['acao'] ?? $_GET['acao'] ?? '';

// Listar / pesquisar usuários
if ($acao === 'listar') {
    $nick = $_GET['nick'] ?? '';
    $nick = "%$nick%";
    $stmt = $conn->prepare("SELECT id_usuario, nick, email, isAdm FROM usuarios WHERE nick LIKE ?");
    $stmt->bind_param("s", $nick);
    $stmt->execute();
    $res = $stmt->get_result();
    $usuarios = [];
    while ($u = $res->fetch_assoc()) {
        $usuarios[] = $u;
    }
    echo json_encode(["status" => "ok", "usuarios" => $usuarios]);
}

// Deletar usuário
if ($acao === 'deletar') {
    $id = (int) $_POST['id_usuario'];
    
    // impede deletar a si mesmo
    if ($id == (int) $_SESSION['id_usuario']) {
        echo json_encode(["status" => "erro", "msg" => "Você não pode deletar sua própria conta por aqui!"]);
        exit;
    }

    // impede deletar outro admin
    $check = $conn->prepare("SELECT isAdm FROM usuarios WHERE id_usuario = ?");
    $check->bind_param("i", $id);
    $check->execute();
    $alvo = $check->get_result()->fetch_assoc();

    if ($alvo['isAdm'] == 1) {
        echo json_encode(["status" => "erro", "msg" => "Não é possível deletar outro administrador!"]);
        exit;
    }

   if ($acao === 'deletar') {
    $id = (int) $_POST['id_usuario'];
    
    if ($id == (int) $_SESSION['id_usuario']) {
        echo json_encode(["status" => "erro", "msg" => "Você não pode deletar sua própria conta por aqui!"]);
        exit;
    }

    $check = $conn->prepare("SELECT isAdm FROM usuarios WHERE id_usuario = ?");
    $check->bind_param("i", $id);
    $check->execute();
    $alvo = $check->get_result()->fetch_assoc();

    if ($alvo['isAdm'] == 1) {
        echo json_encode(["status" => "erro", "msg" => "Não é possível deletar outro administrador!"]);
        exit;
    }

    // deleta o progresso primeiro
    $stmt = $conn->prepare("DELETE FROM progresso WHERE id_usuario = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // agora deleta o usuário
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo json_encode(["status" => "ok", "msg" => "Usuário deletado."]);
}

// Trocar senha de usuário
if ($acao === 'trocarSenha') {
    $id = (int) $_POST['id_usuario'];
    $nova = password_hash($_POST['nova_senha'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE usuarios SET senha = ? WHERE id_usuario = ?");
    $stmt->bind_param("si", $nova, $id);
    $stmt->execute();
    echo json_encode(["status" => "ok", "msg" => "Senha atualizada."]);
}