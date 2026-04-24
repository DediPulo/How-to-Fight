<?php include 'header.php'; ?>

<main class="container my-5 text-white">
  <section class="contact-section">
    <h2 class="mb-4">Entre em Contato</h2>
    <p class="mb-4">
      Tem dúvidas, sugestões ou precisa de suporte? Preencha o formulário abaixo e nossa equipe vai responder o mais rápido possível.
    </p>

    <form action="processa_contato.php" method="POST">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="mb-3">
        <label for="mensagem" class="form-label">Mensagem</label>
        <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </section>
</main>

<?php include 'footer.php'; ?>
