<?php include 'header.php'; ?>

<?php
require_once 'banco/conexao.php'; 

$id_usuario = $_SESSION['id_usuario'];
$id_usuario = $_SESSION['id_usuario'];
$isAdm = $_SESSION['isAdm'] ?? 0; // NOVO

$rank_res = $conn->query("
    SELECT r.nome FROM rankings r
    JOIN usuarios u ON u.id_ranking = r.id_ranking
    WHERE u.id_usuario = $id_usuario
");
$ranking = $rank_res->fetch_assoc()['nome'] ?? 'Sem ranking';

function getDadosUsuario($id_usuario) {
    global $conn;
    $res = $conn->query("
        SELECT u.nick, u.email, r.nome as ranking
        FROM usuarios u
        JOIN rankings r ON r.id_ranking = u.id_ranking
        WHERE u.id_usuario = $id_usuario
    ");
    return $res->fetch_assoc();
}

$user = getDadosUsuario($id_usuario);
$ranking = $user['ranking'] ?? 'Sem ranking';

$id_usuario = $_SESSION['id_usuario'];
$user = getDadosUsuario($id_usuario);
$ranking = $user['ranking'] ?? 'Sem ranking';

//id das fotos

$avatars = [
  1 => "../pagina/Image/jin.png",
  2 => "../pagina/Image/kazuya.png",
  3 => "../pagina/Image/reina.png"
];

$fotoId = (isset($_SESSION['foto_id']) && $_SESSION['foto_id'] > 0) ? $_SESSION['foto_id'] : 1;
$caminhoFoto = $avatars[$fotoId];
?>

<script>
function showTab(tabId) {
  document.querySelectorAll('.action-item').forEach(el => el.classList.remove('active'));
  document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));

  event.target.classList.add('active');
  document.getElementById(tabId).classList.add('active');
}
</script>

<main class="profile-main">

  <!-- Mensagem global no topo -->
  <div id="Senhamensagem" class="text-center"></div>

  <section class="profile-card">

    <!-- Sidebar esquerda -->
    <div class="profile-sidebar">
      <div class="profile-avatar">
        <img src="<?php echo $caminhoFoto; ?>" alt="Avatar do usuário">
      </div>
      <div class="profile-actions">
        <span class="action-item active" onclick="showTab('perfil')">Editar Perfil</span>
        <span class="action-item" onclick="showTab('icone')">Trocar Ícone</span>
        <?php if ($isAdm): ?>
            <span class="action-item" onclick="showTab('admin')">Gerenciar Usuários</span>
        <?php endif; ?>
      </div>

      <button type="button" class="btn btn-danger w-100 mt-3" id="btnDeletar">
          Deletar Perfil
        </button>
    </div>

    <!-- Área de conteúdo (direita) -->
    <div class="profile-content">

      <!-- Aba Perfil -->
      <div id="perfil" class="tab-content active">
        <div class="profile-info">
          <h2 class="mb-4 text-center">Meu Perfil</h2>

          <div class="mb-3">
            <label class="form-label">Nome de Usuário</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($user['nick']) ?>" disabled>
          </div>

          <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" disabled>          
          </div>

          <div class="mb-3">
            <label class="form-label">Ranking</label>
            <p class="profile-ranking"><?= htmlspecialchars($ranking) ?></p>
          </div>

          <h4 class="mt-4">Alterar Senha</h4>
          <form id="formSenha" action="../exercicios/banco/editarSenha.php" method="POST">
            <div class="mb-3 senha-wrapper">
              <label for="senhaAtual" class="form-label">Senha Atual</label>
              <input type="password" class="form-control" id="senhaAtual" name="senhaAtual" required>
              <i class="fa fa-eye olho" onclick="toggleSenha('senhaAtual', this)"></i>
            </div>


          <div class="mb-3 senha-wrapper">
            <label for="novaSenha" class="form-label">Nova Senha</label>
            <input type="password" class="form-control" id="novaSenha" name="novaSenha" required>
            <i class="fa fa-eye olho" onclick="toggleSenha('novaSenha', this)"></i>
          </div>
          <div id="msgSenha" class="mt-2"></div>

            <button type="submit" class="btn-atualizar w-100">Atualizar Senha</button>
          </form>
        </div>
      </div> <!-- fecha aba perfil -->

        <!-- Aba Ícone -->
        <div id="icone" class="tab-content">
        <div class="icon-box">
          <h2 class="mb-4 text-center">Escolher Ícone</h2>
          <form action="../exercicios/banco/editarFoto.php" method="POST">
              <div class="avatar-box">
                <img src="../pagina/Image/jin.png" data-id="1">
                <img src="../pagina/Image/kazuya.png" data-id="2">
                <img src="../pagina/Image/reina.png" data-id="3">
              </div>
              <div class="button-box">
                  <input type="hidden" name="foto_id" id="foto_id">
                  <button type="submit" class="btn-red">Salvar Foto</button>
              </div>
            </form>
          </div>
      </div> <!-- fecha aba ícone -->

      <?php if ($isAdm): ?>
      <div id="admin" class="tab-content">
        <div class="admin-content">  <!-- ADICIONA ISSO -->
          <h2 class="mb-4 text-center">Gerenciar Usuários</h2>

          <div class="mb-3 d-flex gap-2">
            <input type="text" id="searchNick" class="form-control" placeholder="Pesquisar por nick...">
            <button class="btn-red" onclick="buscarUsuarios()">Buscar</button>
          </div>

          <div id="listaUsuarios"></div>
        </div>  <!-- FECHA AQUI -->
      </div>
      <?php endif; ?>

    </div> <!-- fecha profile-content -->

  </section>
</main>

<script>
// Função para mostrar abas
function showTab(tabId) {
  document.querySelectorAll('.action-item').forEach(el => el.classList.remove('active'));
  document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));

  event.target.classList.add('active');
  document.getElementById(tabId).classList.add('active');
}

// Função para atualizar senha
 async function atualizarSenha(e) {
  e.preventDefault();
  const formData = new FormData(document.getElementById('formSenha'));
  const novaSenha = document.getElementById('novaSenha').value;
  const msgDiv = document.getElementById('msgSenha');

  if (novaSenha.length < 6) {
  msgDiv.textContent = 'A nova senha deve ter no mínimo 6 caracteres!';
  msgDiv.style.color = 'red';
  msgDiv.style.marginTop = '10px';
  return;
} else {
  msgDiv.textContent = ''; // limpa se tiver ok
}

  try {
    const resp = await fetch("../exercicios/banco/editarSenha.php", {
      method: 'POST',
      body: formData
    });
    const data = await resp.json();

    if (data.status === "ok") {
      document.getElementById('senhaAtual').value = "";
      document.getElementById('novaSenha').value = "";
      window.location.href = "/exercicios/perfil.php?msg=" + encodeURIComponent(data.msg) + "&type=sucesso";
    } else {
      msgDiv.textContent = data.msg;
      msgDiv.style.color = "red";
      msgDiv.style.marginTop = "8px";
    }
  } catch (err) {
    msgDiv.textContent = "Erro inesperado: " + err;
    msgDiv.style.color = "red";
    msgDiv.style.marginTop = "8px";
  }
}

async function deletarPerfil() {
  Swal.fire({
    title: 'Tem certeza?',
    text: "Essa ação não pode ser desfeita!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Sim, deletar!',
    cancelButtonText: 'Cancelar'
  }).then(async (result) => {
    if (result.isConfirmed) {
      try {
        const resp = await fetch("../exercicios/banco/deletarPerfil.php", { method: "POST" });
        const data = await resp.json();

        if (data.status === "ok") {
          Swal.fire({
            title: 'Deletado!',
            text: data.msg,
            icon: 'success',
            confirmButtonColor: '#e63946'
          }).then(() => {
              window.location.href = "../pagina/HTML/index.html";
          });
        } else {
          Swal.fire('Erro', data.msg, 'error');
        }
      } catch (err) {
        Swal.fire('Erro inesperado', err.toString(), 'error');
      }
    }
  });
}

// Função para mostrar mensagens da URL
function mostrarMensagemURL() {
  const params = new URLSearchParams(window.location.search);
  const msg = params.get("msg");
  const type = params.get("type");
  const aba = params.get("aba"); // adiciona isso

    // abre a aba certa se vier na URL
    if (aba) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.action-item').forEach(el => el.classList.remove('active'));
    document.getElementById(aba).classList.add('active');
    document.querySelector(`[onclick="showTab('${aba}')"]`).classList.add('active');
  }

  if (msg) {
    const div = document.getElementById("Senhamensagem");
    div.textContent = msg;
    div.className = type === "sucesso" ? "alert alert-success text-center" : "alert alert-danger text-center";

    div.style.display = "block";
    div.style.opacity = "1";
    setTimeout(() => { div.style.opacity = "0"; }, 3000);
    setTimeout(() => { div.style.display = "none"; }, 4000);
  }
}

function initAvatarSelection() {
  const avatars = document.querySelectorAll('.avatar-box img');
  const fotoIdInput = document.getElementById('foto_id');

  avatars.forEach(img => {
    img.addEventListener('click', () => {
      avatars.forEach(i => i.classList.remove('selected'));
      img.classList.add('selected');
      fotoIdInput.value = img.dataset.id;
    });
  });
}

async function buscarUsuarios() {
  const nick = document.getElementById('searchNick').value;
  const resp = await fetch(`../exercicios/banco/gerenciarUsuarios.php?acao=listar&nick=${nick}`);
  const data = await resp.json();

  if (data.status !== 'ok') return;

  const lista = document.getElementById('listaUsuarios');
  lista.innerHTML = data.usuarios.map(u => `
    <div class="d-flex justify-content-between align-items-center mb-2 p-2" style="background:#1a1a1a; border-radius:8px;">
      <div>
        <strong>${u.nick}</strong><br>
        <small>${u.email}</small>
      </div>
      <div class="d-flex gap-2">
        <button class="btn-red" onclick="trocarSenhaAdmin(${u.id_usuario})">Trocar Senha</button>
        <button class="btn-red" onclick="deletarUsuario(${u.id_usuario}, '${u.nick}')">Deletar</button>
      </div>
    </div>
  `).join('');
}

async function deletarUsuario(id, nick) {
  Swal.fire({
    title: `Deletar ${nick}?`,
    text: "Essa ação não pode ser desfeita!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Deletar!',
    cancelButtonText: 'Cancelar'
  }).then(async (result) => {
    if (result.isConfirmed) {
      const fd = new FormData();
      fd.append('acao', 'deletar');
      fd.append('id_usuario', id);
      const resp = await fetch('../exercicios/banco/gerenciarUsuarios.php', { method: 'POST', body: fd });
      const data = await resp.json();
      if (data.status === 'ok') {
        Swal.fire('Pronto!', data.msg, 'success');
        buscarUsuarios();
      } else {
        Swal.fire('Erro!', data.msg, 'error');
      }
    }
  });
}

async function trocarSenhaAdmin(id) {
  const { value: novaSenha } = await Swal.fire({
    title: 'Nova senha',
    input: 'password',
    inputPlaceholder: 'Digite a nova senha',
    showCancelButton: true,
    confirmButtonText: 'Salvar',
    cancelButtonText: 'Cancelar',
    inputAttributes: {
      id: 'swal-senha'
    },
    preConfirm: (value) => {
      const olho = document.querySelector('.swal2-popup i');
      if (!value) {
        if (olho) olho.style.visibility = 'hidden';
        Swal.showValidationMessage('Digite uma senha!');
        return false;
      }
      if (value.length < 6) {
        if (olho) olho.style.visibility = 'hidden';
        Swal.showValidationMessage('Mínimo 6 caracteres!');
        return false;
      }
      if (olho) olho.style.visibility = 'visible';
      return value;
    },
    didOpen: () => {
      const input = document.getElementById('swal-senha');
      const btn = document.createElement('i');
      btn.className = 'fa fa-eye';
      btn.style = 'position:absolute; right:50px; top:46%; transform:translateY(-50%); cursor:pointer; color:#888;';
      btn.onclick = () => {
        input.type = input.type === 'password' ? 'text' : 'password';
        btn.classList.toggle('fa-eye');
        btn.classList.toggle('fa-eye-slash');
      };
      input.parentElement.style.position = 'relative';
      input.parentElement.appendChild(btn);
      input.addEventListener('input', () => {
      const olho = document.querySelector('.swal2-popup i');
      if (olho) olho.style.visibility = 'visible';
    });
    }
  });

  if (novaSenha) {
    const fd = new FormData();
    fd.append('acao', 'trocarSenha');
    fd.append('id_usuario', id);
    fd.append('nova_senha', novaSenha);
    const resp = await fetch('../exercicios/banco/gerenciarUsuarios.php', { method: 'POST', body: fd });
    const data = await resp.json();
    Swal.fire('Pronto!', data.msg, 'success');
  }
}

function toggleSenha(id, icon) {
  const input = document.getElementById(id);
  input.type = input.type === 'password' ? 'text' : 'password';
  icon.classList.toggle('fa-eye');
  icon.classList.toggle('fa-eye-slash');
}

// Liga os eventos
document.getElementById('formSenha').addEventListener('submit', atualizarSenha);
document.getElementById('btnDeletar').addEventListener('click', deletarPerfil);
document.addEventListener('DOMContentLoaded', initAvatarSelection);
mostrarMensagemURL();
</script>

<?php include 'footer.php'; ?>
