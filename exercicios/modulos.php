<?php include 'header.php'; ?>

<?php 
require_once 'banco/conexao.php';

$id_usuario = $_SESSION['id_usuario'];

function getProgressoModulo($conn, $id_usuario, $id_modulo) {
    $total_res = $conn->query("SELECT COUNT(*) as total FROM missoes WHERE id_modulo = $id_modulo");
    $total = $total_res->fetch_assoc()['total'];

    $feitas_res = $conn->query("
        SELECT COUNT(*) as feitas FROM progresso p
        JOIN missoes m ON m.id_missao = p.id_missao
        WHERE p.id_usuario = $id_usuario AND m.id_modulo = $id_modulo AND p.status = 'concluido'
    ");
    $feitas = $feitas_res->fetch_assoc()['feitas'];
    $pct = $total > 0 ? round(($feitas / $total) * 100) : 0;

    if ($feitas == 0)         $status = ['label' => 'Não iniciada', 'class' => 'status-none'];
    elseif ($feitas < $total) $status = ['label' => 'Em andamento', 'class' => 'status-progress'];
    else                      $status = ['label' => 'Finalizada',   'class' => 'status-done'];

    return compact('total', 'feitas', 'pct', 'status');
}

$p1 = getProgressoModulo($conn, $id_usuario, 1);
$p2 = getProgressoModulo($conn, $id_usuario, 2);
?>

<div class="modulos-grid">

  <a href="fundamentos.php" class="modulo-card">
    <div class="modulo-card-img">
      <img src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/Image/reina1.png" alt="Fundamentos">
    </div>
    <div class="modulo-card-bar"></div>
    <div class="modulo-card-body">
      <div class="modulo-card-num">Módulo 01</div>
      <h2 class="modulo-card-title">Fundamentos</h2>
      <p class="modulo-card-desc">Aprenda os conceitos básicos de jogos de luta.</p>
      <div class="modulo-card-progress">
        <div class="modulo-progress-status <?= $p1['status']['class'] ?>"><?= $p1['status']['label'] ?></div>
        <div class="modulo-progress-bar">
          <div class="modulo-progress-fill" style="width: <?= $p1['pct'] ?>%"></div>
        </div>
        <span class="modulo-progress-label"><?= $p1['feitas'] ?>/<?= $p1['total'] ?> missões</span>
      </div>
    </div>
  </a>

  <a href="ofensiva.php" class="modulo-card">
    <div class="modulo-card-img">
      <img src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/Image/reina2.png" alt="Fundamentos Ofensivos">
    </div>
    <div class="modulo-card-bar"></div>
    <div class="modulo-card-body">
      <div class="modulo-card-num">Módulo 02</div>
      <h2 class="modulo-card-title">Fundamentos Ofensivos</h2>
      <p class="modulo-card-desc">Aprenda os métodos de abrir a defesa do oponente</p>
      <div class="modulo-card-progress">
        <div class="modulo-progress-status <?= $p2['status']['class'] ?>"><?= $p2['status']['label'] ?></div>
        <div class="modulo-progress-bar">
          <div class="modulo-progress-fill" style="width: <?= $p2['pct'] ?>%"></div>
        </div>
        <span class="modulo-progress-label"><?= $p2['feitas'] ?>/<?= $p2['total'] ?> missões</span>
      </div>
    </div>
  </a>

</div>

<?php include 'footer.php'; ?>