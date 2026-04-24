<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(['sucesso' => false, 'erro' => 'não autenticado']);
    exit;
}

require_once 'conexao.php';


$id_usuario = (int) $_SESSION['id_usuario'];
$id_missao  = (int) $_POST['id_missao'];
$acao       = $_POST['acao'];

if ($acao === 'concluir') {

    $check = $conn->prepare("SELECT id_progresso FROM progresso WHERE id_usuario = ? AND id_missao = ?");
    $check->bind_param("ii", $id_usuario, $id_missao);
    $check->execute();
    $check->store_result();

    if ($check->num_rows === 0) {
        $stmt = $conn->prepare("INSERT INTO progresso (id_usuario, id_missao, data_inicio, data_fim, status) VALUES (?, ?, NOW(), NOW(), 'concluido')");
        $stmt->bind_param("ii", $id_usuario, $id_missao);
        $stmt->execute();
    }

} elseif ($acao === 'desfazer') {

    $stmt = $conn->prepare("DELETE FROM progresso WHERE id_usuario = ? AND id_missao = ?");
    $stmt->bind_param("ii", $id_usuario, $id_missao);
    $stmt->execute();

}

// Busca o módulo desta missão
$mod = $conn->prepare("SELECT id_modulo FROM missoes WHERE id_missao = ?");
$mod->bind_param("i", $id_missao);
$mod->execute();
$mod->bind_result($id_modulo);
$mod->fetch();
$mod->close();

// Total de missões do módulo
$total_stmt = $conn->prepare("SELECT COUNT(*) FROM missoes WHERE id_modulo = ?");
$total_stmt->bind_param("i", $id_modulo);
$total_stmt->execute();
$total_stmt->bind_result($total_missoes);
$total_stmt->fetch();
$total_stmt->close();

// Total concluídas pelo usuário neste módulo
$feitas_stmt = $conn->prepare("
    SELECT COUNT(*) FROM progresso p
    JOIN missoes m ON m.id_missao = p.id_missao
    WHERE p.id_usuario = ? AND m.id_modulo = ? AND p.status = 'concluido'
");
$feitas_stmt->bind_param("ii", $id_usuario, $id_modulo);
$feitas_stmt->execute();
$feitas_stmt->bind_result($missoes_feitas);
$feitas_stmt->fetch();
$feitas_stmt->close();

$ranking_subiu = false;

// Mapeamento fixo: módulo X completo → vai pro ranking Y
$ranking_por_modulo = [
    1 => 2, // Fundamentos → ranking 2
    2 => 3, // Ofensiva    → ranking 3
    3 => 4, // Estratégia  → ranking 4
];

if ($missoes_feitas === $total_missoes && $total_missoes > 0 && isset($ranking_por_modulo[$id_modulo])) {

    $ranking_destino = $ranking_por_modulo[$id_modulo];

    // Pega ranking atual do usuário
    $rank_stmt = $conn->prepare("SELECT id_ranking FROM usuarios WHERE id_usuario = ?");
    $rank_stmt->bind_param("i", $id_usuario);
    $rank_stmt->execute();
    $rank_stmt->bind_result($ranking_atual);
    $rank_stmt->fetch();
    $rank_stmt->close();

    // Só sobe se ainda não chegou nesse ranking
    if ($ranking_atual < $ranking_destino) {
        $up_stmt = $conn->prepare("UPDATE usuarios SET id_ranking = ? WHERE id_usuario = ?");
        $up_stmt->bind_param("ii", $ranking_destino, $id_usuario);
        $up_stmt->execute();
        $ranking_subiu = true;
    }
}

$porcentagem = $total_missoes > 0 ? round(($missoes_feitas / $total_missoes) * 100) : 0;

echo json_encode([
    'sucesso'       => true,
    'feitas'        => $missoes_feitas,
    'total'         => $total_missoes,
    'porcentagem'   => $porcentagem,
    'ranking_subiu' => $ranking_subiu
]);

$conn->close();
?>