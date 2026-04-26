<?php include 'header.php'; ?>

<?php
function cmd($nome) {
    return '<span class="cmd-icon"><img src="../pagina/Image/comandos/' . $nome . '.png" alt="' . $nome . '"></span>';
}
?>

<main class="fund-page">

  <h1 class="fund-page-title">Guia de Fundamentos</h1>

  <div class="fund-intro">
    Bem-vindo, lutador. Nesta seção você vai construir a base que separa quem aperta botão aleatório
    de quem realmente compete — os fundamentos. Assim como em qualquer arte marcial, dominar o básico
    molda não só como você joga, mas como você pensa sob pressão. Seja você completamente novo no
    gênero ou apenas preenchendo lacunas, é aqui que tudo começa.
  </div>

  <div class="fund-sections">

    <!-- ============================
         01 — MOVIMENTAÇÃO BÁSICA
    ============================= -->
    <section class="fund-section">

      <div class="fund-section-header">
        <span class="fund-section-num">01</span>
        <h2 class="fund-section-title">Movimentação Básica</h2>
      </div>

      <p class="fund-text">
        Assim como dar os primeiros passos como bebê, você dará seus primeiros passos como um
        futuro lutador, use seus analógicos/stick/keys para se movimentar. os comandos universais
        para jogos de lutas são os movimentos normais, dashes
        <?= cmd('ff')?> ou
        <?=cmd('bb') ?>, pulos
        <?= cmd('ufh')?> ou
        <?=cmd('ubh') ?>
        e corrida
        <?= cmd('running')?> (que será chamado de WR ao redor da jornada.)
      </p>

      <p class="fund-text">
        setas como
        <?=cmd('ufh')?> e outras simplesmente significa segurar o botão.
      </p>

      <!-- Vídeo: movimentação geral -->
      <div class="fund-video">
        <img src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/Image/padrao.png" alt="Movimentação básica" class="thumb">
        <video class="preview" src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/videos/modulo%201/movement.mp4" muted loop></video>
      </div>
      <p class="fund-video-caption">Demonstração de movimentação básica no neutro</p>

      <p class="fund-text">
        Caso já tenha experiência prévia em fighting games, seja jogando ou assistindo, vai
        lembrar que pulos são uma das partes essenciais da movimentação, sendo uma forma de iniciar
        sua pressão ofensiva, mas isso perde grande parte do seu valor em Tekken, onde o pulo é
        reservado para situações de nicho ou simplesmente ignorado pela maioria dos jogadores
      </p>


    </section>


    <!-- ============================
         02 — DEFESA
    ============================= -->
    <section class="fund-section">

      <div class="fund-section-header">
        <span class="fund-section-num">02</span>
        <h2 class="fund-section-title">Defesa</h2>
      </div>

      <p class="fund-text">
        Após dar seus primeiros passos, imagino que esteja sedento para aprender a dar seus primeiros socos,
        seus primeiros ataques especiais e tudo que fará seu oponente cair, e te entendemos, afinal de conta
        estamos num fighting game. Mas, antes de sairmos socando tudo pela frente, mais importante do que ser
        uma máquina de matar, é saber ser uma máquina de sobrevivência, e é aqui que lhe ensinaremos sobre se defender.
      </p>

      <p class="fund-text">
        para se defender, simplesmente pressione e segure
        <?=cmd('bh')?>
      </p>

      <!-- Vídeo: bloqueio -->
      <div class="fund-video">
        <img src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/Image/padrao.png" alt="Defesa e bloqueio" class="thumb">
        <video class="preview" src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/videos/modulo%201/blockfail.mp4" muted loop></video>
      </div>
      <p class="fund-video-caption">Demonstração de bloqueios</p>

      <p class="fund-text">
        Mas espera — você reparou que aquele último ataque passou pela defesa? Isso é intencional.
        A defesa no Tekken nunca é absoluta, e é exatamente isso que torna o jogo interessante.


      </p>

      <p class="fund-text">
        O que aconteceu ali foi um ataque baixo. Em jogos de luta, o seu oponente vai alternar entre ataques em pé
        e ataques baixos justamente pra confundir sua defesa — você não consegue bloquear os dois ao mesmo tempo.
        O objetivo é criar essas brechas, forçar um erro, e capitalizar em cima disso com um combo ou simplesmente
        manter a pressão até uma oportunidade maior aparecer.
      </p>

      <!-- Sub-tópico: Side Step -->
      <div class="fund-subtopic">
        <span class="fund-subtopic-tag">Dentro da defesa</span>
        <h3 class="fund-subtopic-title">Propriedades de ataques</h3>

        <p class="fund-text">
          Agora que sabe que a defesa não é absoluta, lhe mostraremos as propriedades de ataques existentes em Tekken.
          Em Tekken, todos ataques tem propriedades de ataques, sendo eles high, mid e low, se tornando um verdadeiro
          jogo de pedra papel e tesoura
        </p>

        <p class="fund-text">
          Para high e mid, você pode defender se mantendo em pé (segure
          <?=cmd('bh')?>), para low, você precisa se agachar
          (segure
          <?=cmd('dbh')?>)
        </p>

        <!-- Vídeo: side step -->
        <div class="fund-video">
          <img src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/Image/padrao.png" alt="Attack Property" class="thumb">
          <video class="preview" src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/videos/modulo%201/blocks.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">todas propriedades bloqueadas</p>

        <p class="fund-text">
          Parece simples, mas onde entra o pedra papel e tesoura? A resposta é simples:
          assim como lows são bloqueados agachados, highs também são evadidos nessa posição.
        </p>

        <!-- Vídeo: High -->
        <div class="fund-video">
          <img src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/Image/padrao.png" alt="Attack Property" class="thumb">
          <video class="preview" src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/videos/modulo%201/blockhigh.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">High sendo evadido</p>

        <p class="fund-text">
          E se highs são evadidos agachado, então é só ficar no chão o tempo todo, certo? Errado — é exatamente
          aí que o mid entra. Ataques mid acertam você independente de estar em pé ou agachado, sem exceção.
          Agora sim temos nosso pedra papel e tesoura."
        </p>

        <!-- Vídeo: Mid -->
        <div class="fund-video">
          <img src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/Image/padrao.png" alt="Attack Property" class="thumb">
          <video class="preview" src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/videos/modulo%201/failhigh.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">Mid sendo utilizado</p>


      </div>
      <!-- fim sub-tópico -->


    </section>

    <!-- ============================
         03 — SIDE STEP / WALK
    ============================= -->

    <section class="fund-section">

      <div class="fund-section-header">
        <span class="fund-section-num">03</span>
        <h2 class="fund-section-title">Side Step / Side Walk / Armor</h2>
      </div>

      <p class="fund-text">
        No fim, se defender é a única forma de evitar ataques nesse jogo? Não — Tekken é um jogo em espaço
        tridimensional, e isso muda tudo. Usando o side step (
        <?=cmd('ssl')?> ou
        <?=cmd('ssr')?>) você sai do eixo do ataque sem
        precisar bloquear nada. <br> <br>

        (Em caso de dúvidas, não, você não precisa realizar uma estrela no controle para
        dar um sidestep, a figura <?=cmd('n')?> significa neutro, que é basicamente ficar parado. 
        Em outras palavras, apenas um toque pra direção e soltar.)
      </p>

      <!-- Vídeo: Sidestep -->
      <div class="fund-video">
        <img src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/Image/padrao.png" alt="Sidestep" class="thumb">
        <video class="preview" src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/videos/modulo%201/sidestep.mp4" muted loop></video>
      </div>
      <p class="fund-video-caption">demonstração de sidestep</p>

      <!-- Sub-tópico: Side Step -->
      <div class="fund-subtopic">
        <span class="fund-subtopic-tag">Dentro do Side Step</span>
        <h3 class="fund-subtopic-title">Demonstrações em Neutro</h3>

        <p class="fund-text">
          O side step é uma das ferramentas mais subestimadas do jogo. Geralmente só aparece no vocabulário
          de jogadores mais avançados, mas quanto antes você começar a praticar, mais natural vai se tornar
          — e mais difícil você vai ser de acertar.
        </p>

        <div class="fund-video">
          <img src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/Image/padrao.png" alt="Sidestep" class="thumb">
          <video class="preview" src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/videos/modulo%201/sidestepsu.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">demonstração de sidestep</p>

        <p class="fund-text">
          Nem sempre o Side step vai ser o suficiente, alguns ataques possuem continuação que irão se reajustar
          e acabar atingindo sua esquiva.
        </p>

        <div class="fund-video">
          <img src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/Image/padrao.png" alt="Side step fail" class="thumb">
          <video class="preview" src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/videos/modulo%201/sidewalkfa.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">demonstração de sidestep falhando</p>

      </div>
      <!-- fim sub-tópico -->

      <p class="fund-text">
        É aqui que entra o Side Walk — sua principal ferramenta contra ataques que se reajustam ao side step.
        Enquanto o side step é rápido e pontual, o side walk é contínuo, permitindo andar ao redor do oponente
        indefinidamente.
      </p>

      <div class="fund-video">
        <img src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/Image/padrao.png" alt="Side walk" class="thumb">
        <video class="preview" src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/videos/modulo%201/sidewalk.mp4" muted loop></video>
      </div>
      <p class="fund-video-caption">demonstração de side walk</p>

      <!-- Sub-tópico: Side Walk -->
      <div class="fund-subtopic">
        <span class="fund-subtopic-tag">Dentro do Side Walk</span>
        <h3 class="fund-subtopic-title">Demonstrações em Neutro</h3>

        <p class="fund-text">
          Veja abaixo o side walk anulando o mesmo ataque que travou o side step no exemplo anterior.
        </p>

        <div class="fund-video">
          <img src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/Image/padrao.png" alt="Side walk success" class="thumb">
          <video class="preview" src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/videos/modulo%201/sidewalksu.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">demonstração de side walk</p>


      </div>
      <!-- fim sub-tópico -->

      <p class="fund-text">
        Por último, as armaduras. Em situações de pressão intensa, onde seu oponente não para de atacar e
        você não consegue respirar, um ataque com armor pode ser a saída. Ele absorve o golpe do oponente e
        devolve o dano, mandando ele pra longe e devolvendo o controle pra você.
      </p>

      <div class="fund-video">
        <img src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/Image/padrao.png" alt="armor" class="thumb">
        <video class="preview" src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/videos/modulo%201/armor.mp4" muted loop></video>
      </div>
      <p class="fund-video-caption">demonstração de armadura agindo</p>

      <!-- Sub-tópico: Armor -->
      <div class="fund-subtopic">
        <span class="fund-subtopic-tag">Dentro do Armor</span>
        <h3 class="fund-subtopic-title">Fraquezas de Armor</h3>

        <p class="fund-text">
          Assim como os outros meios de se defender, nem mesmo ataques com Armor são imparáveis, sendo
          extremamente ineficázes contra lows e grabs.
        </p>

        <div class="fund-video">
          <img src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/Image/padrao.png" alt="Fracasso da armadura" class="thumb">
          <video class="preview" src="https://github.com/DediPulo/How-to-Fight/raw/main/pagina/videos/modulo%201/armorF.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">demonstração das fraquezas da armadura</p>


      </div>
      <!-- fim sub-tópico -->

</section>
</div> <!-- fecha fund-sections -->

<?php include 'missao.php'; ?>


</main>

<script>
  document.querySelectorAll('.fund-video').forEach(card => {
    const video = card.querySelector('.preview');
    const thumb = card.querySelector('.thumb');

    if (!video || !thumb) return;

    card.addEventListener('mouseenter', () => {
      video.play();
    });

    card.addEventListener('mouseleave', () => {
      video.pause();
      video.currentTime = 0;
    });
  });
</script>



<?php include 'footer.php'; ?>