<?php
// — Cole este bloco no final do seu fundamentos.php, antes do footer —
// Substitua $id_modulo_atual pelo ID correto do módulo (Fundamentos = 1)

$id_modulo_atual = 1;
$id_usuario = $_SESSION['id_usuario'];

require_once 'banco/conexao.php';

// Busca missões do módulo
$missoes = $conn->query("SELECT * FROM missoes WHERE id_modulo = $id_modulo_atual ORDER BY FIELD(dificuldade, 'Fácil', 'Médio', 'Difícil')");

// Busca missões já concluídas pelo usuário
$feitas_res = $conn->query("
    SELECT p.id_missao FROM progresso p
    WHERE p.id_usuario = $id_usuario AND p.status = 'concluido'
");
$feitas = [];
while ($f = $feitas_res->fetch_assoc()) {
    $feitas[] = $f['id_missao'];
}

$total    = $missoes->num_rows;
$concluidas = count($feitas);
$pct      = $total > 0 ? round(($concluidas / $total) * 100) : 0;

$titulos = [
    'duck n launch'    => '3x Defenda o primeiro soco, se agache e puna o oponente com um launcher',
    'armor'            => '3x Defenda o primeiro punho e use armadura se defender enquanto ele ataca.',
    'sidestep n launch' => '3x Defenda o primeiro punho, e execute um sidestep para se esquivar.',
];
?>

<!-- ========== MISSÕES ========== -->
<div class="fund-missions">

  <div class="fund-missions-header">
    <h3 class="fund-missions-title">Missões do Módulo</h3>
    <span class="fund-missions-count"><?= $concluidas ?>/<?= $total ?> concluídas</span>
  </div>

  <p class="fund-missions-desc">
  Para completar as missões, vá em <strong>Modo Treino</strong> no menu principal. 
  Selecione seu personagem, e após entrar no treino, abra o menu, vá em configuração de treino, mude o modo de treino 
  para defesa, e selecione/grave as seguintes ações:<br>
  ação 1: Slaughter Hook <br>
  ação 2: <?=cmd('training2')?> <br>
  ação 3: <?=cmd('training1')?> <br>
  após isso, ajuste a frequência de ações para que apenas uma ação por vez possa agir. <br>
  (em caso do kazuya estar no lado direito, só inverter a direção dos comandos)
</p>

  <!-- Lista de missões -->
  <ul class="fund-missions-list">
    <?php while ($missao = $missoes->fetch_assoc()):
      $concluida = in_array($missao['id_missao'], $feitas);
      $dif_class = strtolower($missao['dificuldade']);
    ?>
    <li class="fund-mission-item <?= $concluida ? 'concluida' : '' ?>" data-id="<?= $missao['id_missao'] ?>">
      <div class="fund-mission-check">
        <input type="checkbox"
               id="missao-<?= $missao['id_missao'] ?>"
               <?= $concluida ? 'checked' : '' ?>
               onchange="marcarMissao(<?= $missao['id_missao'] ?>, this.checked)">
        <label for="missao-<?= $missao['id_missao'] ?>">
          <span class="checkmark"></span>
        </label>
      </div>
      <div class="fund-mission-body">
        <span class="fund-mission-titulo"><?= htmlspecialchars($titulos[$missao['titulo']] ?? $missao['titulo'])?></span>
        <span class="fund-mission-dif <?= $dif_class ?>"><?= $missao['dificuldade'] ?></span>
      </div>
    </li>
    <?php endwhile; ?>
  </ul>
  
  <!-- Barra de progresso -->
  <div class="fund-progress-bar">
    <div class="fund-progress-fill" style="width: <?= $pct ?>%"></div>
  </div>
  <div class="fund-progress-label"><?= $pct ?>% completo</div>

  <p class="fund-missions-desc">
  Launchers: após se agachar, levante-se pressionando <?=cmd('2')?> <br>
  Jin's armor: <?=cmd('armor')?>
</p>

</div>

</div>



<!-- Notificação de ranking -->
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

    // Atualiza visual do item
    item.classList.toggle('concluida', concluido);

    // Atualiza barra
    const fill  = document.querySelector('.fund-progress-fill');
    const label = document.querySelector('.fund-progress-label');
    const count = document.querySelector('.fund-missions-count');

    fill.style.width    = data.porcentagem + '%';
    label.textContent   = data.porcentagem + '% completo';
    count.textContent   = `${data.feitas}/${data.total} concluídas`;

    // Notificação de ranking
    if (data.ranking_subiu) {
      const toast = document.getElementById('rankToast');
      toast.classList.add('show');
      setTimeout(() => toast.classList.remove('show'), 4000);
    }
  });
}
</script>