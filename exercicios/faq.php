<?php include 'header.php'; ?>

<main class="faq-main bg-dark text-white py-5">
        <h1 class="text-center mb-4">Questões Frequentes</h1>

        <div class="accordion" id="faqAccordion">

            <!-- Pergunta 1 -->
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Que tipo de jogo e luta será ensinado?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Inicialmente, os alunos aprenderão apenas sobre <strong>Tekken 8</strong>; mais tarde, pretendo
                        apresentar outros tipos de jogos de luta.
                    </div>
                </div>
            </div>

            <!-- Pergunta 2 -->
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Como serão feitos os guias?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Os guias serão ensinados com a <strong>ação em si</strong> e também mostrando a visibilidade dos
                        botões que estão sendo utilizados.
                    </div>
                </div>
            </div>

            <!-- Pergunta 3 -->
            <div class="accordion-item bg-dark text-white">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        No futuro, que tipos de lutas você pretende inserir?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Os planos incluem <strong>Street Fighter</strong> e <strong>Tag Team Fighting Games</strong>,
                        dois estilos de luta completamente diferentes do que estará incluso inicialmente.
                    </div>
                </div>
            </div>

        </div>
    </main>


<?php include 'footer.php'; ?>
