<?php

require_once 'banco/conexao.php';

$id_usuario_missoes = $_SESSION['id_usuario'];

// Busca todas as missões já concluídas pelo usuário
$feitas_res = $conn->query("
    SELECT p.id_missao FROM progresso p
    WHERE p.id_usuario = $id_usuario_missoes AND p.status = 'concluido'
    ");
$feitas_global = [];
while ($f = $feitas_res->fetch_assoc()) {
    $feitas_global[] = $f['id_missao'];
}

$titulos_missoes = [
    // Módulo 2
    'testar_Ataques' => 'Execute ao menos 3 ataques diferentes com direções distintas',
    'wr'             => '3x execute um ataque enquanto corre',
    'ws'             => '3x execute um ataque enquanto se levante',
    'fc'             => '3x Use um ataque Full Crouch',
    'string1'        => 'Execute uma string completa de 3 hits sem errar o timing',
    'string2'        => 'Interrompa ou escape de uma string do oponente se agachando entre os golpes',
    'grab'           => 'Experimente todos seus grabs',
    'escape'         => 'Escape ou esquive de 3 grabs seguidos',
    'combo'          => '3x Realize um combo com launcher, filler, extender e um ender.',
    'Condition'      => 'Tente condicionar um oponente e conseguir tirar um combo disso.'

];

// Exibe uma missão inline (só checkbox + título)
function missaoInline($id_missao) {
    global $feitas_global, $titulos_missoes, $conn;

$res = $conn->query("
    SELECT titulo, dificuldade FROM missoes 
    WHERE id_missao = $id_missao
    ");    
    $missao = $res->fetch_assoc();
    if (!$missao) return;

    $concluida  = in_array($id_missao, $feitas_global);
    $dif_class  = strtolower(str_replace('á', 'a', str_replace('é', 'e', str_replace('í', 'i', $missao['dificuldade']))));
    $titulo     = $titulos_missoes[$missao['titulo']] ?? $missao['titulo'];
    $checked    = $concluida ? 'checked' : '';
    $item_class = $concluida ? 'fund-mission-item concluida' : 'fund-mission-item';
    ?>
    <div class="fund-mission-inline">
      <ul class="fund-missions-list" style="margin: 1rem 0 0;">
        <li class="<?= $item_class ?>" data-id="<?= $id_missao ?>">
          <div class="fund-mission-check">
            <input type="checkbox"
                   id="missao-<?= $id_missao ?>"
                   <?= $checked ?>
                   onchange="marcarMissao(<?= $id_missao ?>, this.checked)">
            <label for="missao-<?= $id_missao ?>">
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="fund-mission-body">
            <span class="fund-mission-titulo"><?= htmlspecialchars($titulo) ?></span>
            <span class="fund-mission-dif <?= $dif_class ?>"><?= $missao['dificuldade'] ?></span>
          </div>
        </li>
      </ul>
    </div>
    <?php
}

// Exibe a barra de progresso total do módulo
function missaoProgresso($id_modulo) {
    global $id_usuario_missoes, $conn;

    $total_res = $conn->query("
        SELECT COUNT(*) as total FROM missoes 
        WHERE id_modulo = $id_modulo
        ");
    $total = $total_res->fetch_assoc()['total'];

    $feitas_res = $conn->query("
        SELECT COUNT(*) as feitas FROM progresso p
        JOIN missoes m ON m.id_missao = p.id_missao
        WHERE p.id_usuario = $id_usuario_missoes AND m.id_modulo = $id_modulo AND p.status = 'concluido'
    ");
    $feitas = $feitas_res->fetch_assoc()['feitas'];
    $pct = $total > 0 ? round(($feitas / $total) * 100) : 0;
    ?>
    <div class="fund-missions">
      <div class="fund-missions-header">
        <h3 class="fund-missions-title">Missões do Módulo</h3>
        <span class="fund-missions-count"><?= $feitas ?>/<?= $total ?> concluídas</span>
      </div>
      <div class="fund-progress-bar">
        <div class="fund-progress-fill" style="width: <?= $pct ?>%"></div>
      </div>
      <div class="fund-progress-label"><?= $pct ?>% completo</div>
    </div>

    <div class="fund-rank-toast" id="rankToast">
      🏆 Parabéns! Seu ranking subiu!
    </div>

    <script>
    function marcarMissao(id_missao, concluido) {
      const item = document.querySelector(`[data-id="${id_missao}"]`);

      fetch('banco/marcarMissao.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `id_missao=${id_missao}&acao=${concluido ? 'concluir' : 'desfazer'}`
      })
      .then(r => r.json())
      .then(data => {
        if (!data.sucesso) return;

        item.classList.toggle('concluida', concluido);

        const fill  = document.querySelector('.fund-progress-fill');
        const label = document.querySelector('.fund-progress-label');
        const count = document.querySelector('.fund-missions-count');

        if (fill)  fill.style.width  = data.porcentagem + '%';
        if (label) label.textContent = data.porcentagem + '% completo';
        if (count) count.textContent = `${data.feitas}/${data.total} concluídas`;

        if (data.ranking_subiu) {
          const toast = document.getElementById('rankToast');
          toast.classList.add('show');
          setTimeout(() => toast.classList.remove('show'), 4000);
        }
      });
    }
    </script>
    <?php
}
?>