<?php include 'header.php'; ?>

<?php include 'missao2.php'; ?>

<?php
function cmd($nome) {
    return '<span class="cmd-icon"><img src="../pagina/Image/comandos/' . $nome . '.png" alt="' . $nome . '"></span>';
}
?>

<main class="fund-page">



  <h1 class="fund-page-title">Guia Ofensivo</h1>

  <div class="fund-intro">
   No módulo anterior, cobrimos os fundamentos da movimentação e da defesa — e se você completou as missões, 
   já teve um gostinho do que vem por aí: launchers. Deixamos isso em aberto de propósito. 
   Agora é hora de explicar o que foi aquilo, por que funciona, e como transformar cada abertura do oponente em 
   dano real. Bem-vindo ao guia ofensivo.
  </div>

  <div class="fund-sections">

    <!-- ============================
         01 — Combate básico
    ============================= -->
    <section class="fund-section">

            <p class="fund-text">
            Em Tekken, seus ataques são divididos em 4 botões: <?= cmd('1')?> e <?= cmd('2')?> para os socos 
            (esquerda e direita respectivamente) e <?= cmd('3')?> e <?= cmd('4')?> para os chutes 
            (esquerda e direita). Cada botão representa um membro do seu personagem, e combiná-los com direções 
            é o que dá origem a todo o seu arsenal ofensivo.
            </p>

            <div class="fund-video">
                <img src="../pagina/Image/padrao2.png" alt="Ataques básicos" class="thumb">
                <video class="preview" src="../pagina/videos/ataques.mp4" muted loop></video>
            </div>
            <p class="fund-video-caption">Demonstração de ataques básicos</p>


            <!-- SUB-TÓPICO: ATAQUES VARIADOS -->
            <div class="fund-subtopic">
            <span class="fund-subtopic-tag">Dentro do Combate</span>
            <h3 class="fund-subtopic-title">Ataques com Direções</h3>

            <p class="fund-text">
                Pressionar um botão de ataque sozinho é só o começo. Combinando direções com os botões, 
                você acessa movimentos completamente diferentes — cada personagem possui golpes únicos 
                para quase toda combinação possível. Ainda usando jin como exemplo, abaixo vemos alguns 
                exemplos como <?= cmd('df1')?>, <?= cmd('df2')?> e 
                <?= cmd('uf4')?>
            </p>

            <div class="fund-video">
                <img src="../pagina/Image/padrao2.png" alt="Ataques com direções" class="thumb">
                <video class="preview" src="../pagina/videos/ataquesdif.mp4" muted loop></video>
            </div>
            <p class="fund-video-caption">Demonstração de ataques básicos</p>
            
            <div class="fund-mission-card">
                <p class="fund-mission-hint">Maneiro né? que tal testarmos um pouco antes de continuarmos?</p>
                <?php missaoInline(7); ?>
            </div>

            <p class="fund-text">
                Além das direções, o seu estado atual também afeta seus ataques. 
                Enquanto corre, também chamada de <?= cmd('wr')?> você ataca em movimento, após 
                se agachar por completo, você entra no estado de Full crouch ( <?= cmd('fc')?> ) 
                e caso esteja agachado, ao se levantar você vai executar um while standing ( <?= cmd('ws')?> ), 
                Cada estado abre um leque diferente de opções e entender quando entrar neles 
                é parte essencial do jogo ofensivo.
            </p>

            <div class="fund-video">
                <img src="../pagina/Image/padrao2.png" alt="Ataques em estados diferentes" class="thumb">
                <video class="preview" src="../pagina/videos/states.mp4" muted loop></video>
            </div>
            <p class="fund-video-caption">Demonstração dos diferentes estados</p>

            <div class="fund-mission-card">
                <p class="fund-mission-hint">
                    Vamos tentar experimentar mais um pouco nossos leques de ataques
                    antes de se aprofundar mais nas nossas opções ofensivas!
                    todos esses exemplos estão sendo usados da movelist do Jin. <br> <br>
                    como entrar em <?= cmd('wr')?>: <?= cmd('running')?> <br>
                    exemplos de <?= cmd('ws')?>: <?= cmd('ws2')?>, <?= cmd('ws12')?> e <?= cmd('ws44')?> <br>
                    full crouch: <?= cmd('fcdf4')?>
                </p>
                <?php missaoInline(8); ?>
                <?php missaoInline(9); ?>
                <?php missaoInline(10); ?>
                
            </div>

            </div>

            <!-- STRINGS -->
            <p class="fund-text">
            Strings são sequências de ataques encadeados que formam combos naturais do personagem. 
            São majoritariamente usadas para criarem combos, aplicar pressões e buscar launchers para combos maiores.
            no exemplo abaixo mostraremos as 2 principais strings do Jin. <br> <br>
            <?= cmd('string1')?> e <?= cmd('string2')?>
            </p>

            <div class="fund-video">
                <img src="../pagina/Image/padrao2.png" alt="Strings" class="thumb">
                <video class="preview" src="../pagina/videos/string.mp4" muted loop></video>
            </div>
            <p class="fund-video-caption">Demonstração de strings</p>


            <!-- SUB-TÓPICO: PROPRIEDADES DE STRINGS -->
            <div class="fund-subtopic">
            <span class="fund-subtopic-tag">Dentro das Strings</span>
            <h3 class="fund-subtopic-title">Propriedades e Fraquezas</h3>

            <p class="fund-text">
                Como vimos no guia de defesa, todo ataque tem uma propriedade: high, mid ou low. 
                Nas strings isso se torna ainda mais relevante — uma sequência pode começar com um mid 
                e terminar com um low, forçando você a tomar uma decisão rápida. Strings bem construídas 
                podem parecer impossíveis de defender, mas analisadas com calma revelam sempre uma fraqueza: 
                um timing de esquiva, uma propriedade que pode ser evadida ou um gap entre os golpes 
                que permite uma interrupção.
            </p>

            <div class="fund-video">
                <img src="../pagina/Image/padrao2.png" alt="Ataques em estados diferentes" class="thumb">
                <video class="preview" src="../pagina/videos/stringfail.mp4" muted loop></video>
            </div>
            <p class="fund-video-caption">Demonstração de string</p>

            </div>

            <div class="fund-mission-card">
                <p class="fund-mission-hint">
                    Vamos aprender um pouco sobre as próprias strings e como evita-lás! <br>
                    Para a segunda missão, com kazuya selecionado como oponente, vá para o treino > configuração 
                    de treino e selecione defesa, selecionando na lista de movimentos dele vai haver flashpunch combo
                    e Slaughter Hook, selecione qualquer um deles para o seu treino. <br>
                    Experimente também escapar das strings utilizando side step!
                </p>
                <?php missaoInline(11); ?>
                <?php missaoInline(12); ?>

            </div>

            <!-- GRABS -->
            <p class="fund-text">
            Grabs são agarrões que causam dano garantido caso o oponente não reaja a tempo. 
            Eles existem justamente para punir quem fica parado defendendo — se o oponente 
            só bloqueia, um grab passa direto pela guarda. Por isso, alternar entre golpes e 
            agarrões é uma das formas mais eficientes de abrir a defesa adversária. <br>
            Neste exemplo mostraremos os grabs universais, podendo serem executados pressionando <?= cmd('13')?>
            e <?= cmd('24')?>
            </p>

            <div class="fund-video">
                <img src="../pagina/Image/padrao2.png" alt="grabs" class="thumb">
                <video class="preview" src="../pagina/videos/grabs.mp4" muted loop></video>
            </div>
            <p class="fund-video-caption">Demonstração de grabs</p>


            <!-- SUB-TÓPICO: ESCAPAR DE GRABS -->
            <div class="fund-subtopic">
            <span class="fund-subtopic-tag">Dentro dos Grabs</span>
            <h3 class="fund-subtopic-title">Como Escapar</h3>

            <p class="fund-text">
                Para escapar de um grab, pressione <?= cmd('1')?> ou <?= cmd('2')?> no momento do agarrão.
            </p>

            <div class="fund-video">
                <img src="../pagina/Image/padrao2.png" alt="grabs" class="thumb">
                <video class="preview" src="../pagina/videos/grabfail.mp4" muted loop></video>
            </div>
            <p class="fund-video-caption">Tech grab</p>

            <p class="fund-text">
                Acertar o botão do grab não é a unica forma de evitar ele, você também pode esquivar dele
                se agachando, como mostrado no exemplo abaixo.
            </p>

            <div class="fund-video">
                <img src="../pagina/Image/padrao2.png" alt="grabs" class="thumb">
                <video class="preview" src="../pagina/videos/grabdodge.mp4" muted loop></video>
            </div>
            <p class="fund-video-caption">duck no grab</p>

        </div>

        <p class="fund-text">
            Isso ainda seria fácil se pra sair de grab fosse resolvido só pressionando um botão, mas 
            jogos de lutas não são feitos para serem fáceis, então é aqui descobrimos que grabs universais
            são só o começo, cada personagem possui agarrões exclusivos com propriedades únicas, 
            como grabs que acertam agachados, com botões diferentes de evitar ele e até grabs em estados
            diferentes de personagem. Explorá-los faz parte de entender o kit completo do seu personagem. <br>

            nesse exemplo mostraremos os 3 grabs exclusivos do Jin. <br><br>
            <?= cmd('grab1')?> <br>
            <?= cmd('grab2')?> <br>
            <?= cmd('grab3')?> <br>
        </p>


        <div class="fund-video">
            <img src="../pagina/Image/padrao2.png" alt="grabs especiais" class="thumb">
            <video class="preview" src="../pagina/videos/exgrab.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">grabs diferentes</p>

         <!-- SUB-TÓPICO: ESCAPAR DE GRABS -->
            <div class="fund-subtopic">
                <span class="fund-subtopic-tag">Dentro dos Grabs</span>
                <h3 class="fund-subtopic-title">Como lidar com diferentes grabs</h3>

                <p class="fund-text">
                    O botão correto depende do tipo de grab usado pelo oponente. Grabs iniciados com o 
                    braço esquerdo escapam com <?= cmd('1')?>, com o direito com <?= cmd('2')?>, e alguns 
                    grabs especiais exigem os dois ao mesmo tempo. no exemplo usado acima, o primeiro grab 
                    você consegue escapar pressionando <?= cmd('12')?>, já o segundo é <?= cmd('1')?> e o último
                    <?= cmd('2')?>.
                </p>
            </div>

            <div class="fund-mission-card">
                <p class="fund-mission-hint">
                    Curta um pouco testando os grabs diferentes de seu personagem! <br>
                    Para a segunda missão, vá para o treino > configuração de treino e selecione defesa,
                    selecionando na lista de movimentos dos oponentes, bem no final da lista vai ter arremessos. <br>
                    Experimente também escapar de grabs!
                    
                </p>
                <?php missaoInline(13); ?>
                <?php missaoInline(14); ?>

            </div>

    </section>


    <!-- ============================
         02 — Estrutura de combos
    ============================= -->
    <section class="fund-section">

      <div class="fund-section-header">
        <span class="fund-section-num">02</span>
        <h2 class="fund-section-title">Estrutura de Combos</h2>
      </div>

        <p class="fund-text">
        Agora que sabemos como ataques funcionam, e seus tipos diferentes, finalmente iremos aprender sobre 
        combos. Para iniciar, você precisa de um launcher — um ataque que joga o oponente 
        para o ar e abre espaço para um combo completo. No caso do Jin, alguns dos seus principais launchers 
        são <?= cmd('ws2')?>, <?= cmd('uf4')?>, <?= cmd('d34')?> e <?= cmd('ewhf')?>, cada um com suas condições e 
        alcances diferentes. Identificar qual usar em cada situação é o primeiro passo para transformar 
        oportunidades em um verdadeiro combo.
        </p>

        <div class="fund-video">
            <img src="../pagina/Image/padrao2.png" alt="launchers" class="thumb">
            <video class="preview" src="../pagina/videos/launchers.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">demonstração de launchers</p>


        <!-- SUB-TÓPICO: CH LAUNCHERS -->
        <div class="fund-subtopic">
        <span class="fund-subtopic-tag">Dentro dos Launchers</span>
        <h3 class="fund-subtopic-title">Counter Hit Launchers</h3>

        <p class="fund-text">
            Launchers normais não são as únicas formas de mandar o oponente pro ar. Alguns ataques só se tornam 
            launchers quando acertam em Counter Hit — ou seja, quando interrompem um ataque do oponente no momento 
            exato. Esses são os CH launchers, e dominar quando usá-los abre um leque completamente novo de 
            oportunidades ofensivas. <br>

            exemplos abaixos com: <br>
            <?= cmd('f4')?> <br>
            <?= cmd('chstring')?> <br>
            <?= cmd('chstring2')?> <br>
            
        </p>

         <div class="fund-video">
            <img src="../pagina/Image/padrao2.png" alt=" chlaunchers" class="thumb">
            <video class="preview" src="../pagina/videos/chlaunch.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">demonstração de launchers</p>

        </div>

        <!-- FILLERS -->
        <p class="fund-text">
        Após o launcher, antes de chegar no momento decisivo do combo, você pode encaixar fillers — 
        ataques intermediários que mantêm o oponente no ar e aumentam o dano total sem desperdiçar 
        o estado de queda. São golpes simples, geralmente de um ou dois botões. <br>

        exemplos abaixos com: <br>
            <?= cmd('b3f1')?> <br>
            <?= cmd('31')?> <br>

        </p>

        <div class="fund-video">
            <img src="../pagina/Image/padrao2.png" alt=" fillers" class="thumb">
            <video class="preview" src="../pagina/videos/filler.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">demonstração de fillers</p>


        <!-- EXTENDERS / TORNADO -->
        <p class="fund-text">
        Extender é a parte do combo onde aciona um tornado, um estado onde o oponente gira no ar, te 
        dando um tempo para se reposicionar e escolher sua rota de ender. <br>

        exemplos abaixos com: <br>
            <?= cmd('b12')?> <br>
            <?= cmd('extender')?> <br>
        </p>

        <div class="fund-video">
            <img src="../pagina/Image/padrao2.png" alt=" extender" class="thumb">
            <video class="preview" src="../pagina/videos/extender.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">demonstração de extenders</p>


        <!-- ENDERS -->
        <p class="fund-text">
        Por fim, os enders encerram o combo.  última etapa do combo, escolhido estrategicamente 
        para maximizar o dano, posicionar o oponente ou garantir uma situação vantajosa 
        após a queda. <br>

        exemplos abaixos com: <br>
        <?= cmd('ender1')?> <br>
        <?= cmd('ender2')?> <br>
        </p>

        <div class="fund-video">
            <img src="../pagina/Image/jinside.png" alt=" ender" class="thumb">
            <video class="preview" src="../pagina/videos/ender.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">demonstração de enders</p>

         <!-- SUB-TÓPICO: CH LAUNCHERS -->
        <div class="fund-subtopic">
        <span class="fund-subtopic-tag">Dentro dos combos</span>
        <h3 class="fund-subtopic-title">Combos Finalizado</h3>

        <p class="fund-text">
            Caso tenha ficado muito confuso após tanta informação, separamos essa sessão 
            para simplificar o combo em um único video, para que possa digerir vendo o combo 
            completo. <br>

            exemplos abaixos com: <br>
            <?=cmd('combo1')?>
      
        </p>

         <div class="fund-video">
            <img src="../pagina/Image/padrao2.png" alt=" combo1" class="thumb">
            <video class="preview" src="../pagina/videos/combo1.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">demonstração de combo</p>

        <p class="fund-text">
            E por fim para mostrar que essa base é firme e seguida até em outros personagens. <br>

            exemplos abaixos com: <br>
            <?=cmd('combo2')?>
        </p>

        <div class="fund-video">
            <img src="../pagina/Image/sideclive.png" alt=" combo1" class="thumb">
            <video class="preview" src="../pagina/videos/combo2.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">demonstração de combo 2</p>

        </div>

        <div class="fund-mission-card">
                <p class="fund-mission-hint">
                    Depois de uma leitura intensa, que tal esfriar a cabeça realizando
                    seus primeiros combos?  <br>

                    experimente aprender seu primeiro combo com os exemplos vistos 
                    previamente.
                </p>
                <?php missaoInline(15); ?>     
            </div>

    </section>

    <!-- ============================
         03 — Pressão
    ============================= -->

    <section class="fund-section">

      <div class="fund-section-header">
        <span class="fund-section-num">03</span>
        <h2 class="fund-section-title">Pressão e iniciativa</h2>
      </div>

        <p class="fund-text">
        Tudo isso é realmente incrível, mas como você vai acertar um launcher de verdade? A resposta está 
        nos fundamentos que já vimos. Lembra das propriedades de ataque? Então, é ai que entra o condicionamento
        do oponente, com você alternando entre high, mid e low, usando todo seu arsenal pra fazer seu oponente pensar
        em qual será a forma ideal de se defender. <br> <br>
        Uma dica de companheiro? Chute as canelas deles até elas começarem a doer e eles se preocuparem com isso.
        </p>

        <div class="fund-video">
            <img src="../pagina/Image/padrao2.png" alt="condição" class="thumb">
            <video class="preview" src="../pagina/videos/condition.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">demonstração de condicionamento</p>

        <p class="fund-text">
        O mesmo vale para o movimento. Side step e duck não são só ferramentas defensivas — são gatilhos 
        ofensivos. Um side step bem executado esquiva de um ataque e coloca você numa posição privilegiada 
        para punir. Um duck no momento certo esquiva um high e abre espaço para um while standing launcher. 
        Os fundamentos e o ataque não são fases separadas do jogo, são a mesma coisa vista de ângulos diferentes.
        </p>

        <div class="fund-video">
            <img src="../pagina/Image/padrao2.png" alt="defesas fundamentais" class="thumb">
            <video class="preview" src="../pagina/videos/sideduck.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">demonstração de fundamentos</p>


        <p class="fund-text">
        Por último, um conceito que vai aparecer muito conforme você evolui: frames. Todo ataque no Tekken 
        tem uma velocidade medida em quadros — quantos frames leva para sair, para acertar e para terminar. 
        Simplicando muito, dependendo do tipo de ataque, após serem bloqueados, podem ser punidos por ficar 
        em desvantagem de frames, e após acertar o oponente, você consegue aumentar sua pressão tendo abertura 
        pra usar outros ataques justamente por estar em vantagem de frames. <br> <br>
        Isso é um assunto extremamente longo e que merece uma página só pra ele, mas só pra você já ter uma noção,
        bloquear alguns ataques especificos te dão vantagem de frames o suficiente para você punir com um launcher.
        <br> Vai ter a certeza de que foi um ataque púnivel de launcher quando o "Punish" aparece abaixo do seu 
        contador de combo.
        </p>

        <div class="fund-video">
            <img src="../pagina/Image/padrao2.png" alt="defesas fundamentais" class="thumb">
            <video class="preview" src="../pagina/videos/punish.mp4" muted loop></video>
        </div>
        <p class="fund-video-caption">demonstração de punições</p>

        <div class="fund-mission-card">
                <p class="fund-mission-hint">
                    E agora para fechar com chave de ouro, que tal irmos para uma partida e testarmos
                    tudo que parendemos? <br>
                </p>
                <?php missaoInline(16); ?>     
            </div>


</section>
</div> <!-- fecha fund-sections -->
<?php missaoProgresso(2); ?>


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