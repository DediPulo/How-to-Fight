<?php
session_start();

// Mapeamento dos avatares disponíveis
$avatars = [
    1 => "../pagina/Image/jin.png",
    2 => "../pagina/Image/kazuya.png",
    3 => "../pagina/Image/reina.png"
];

// Se não tiver nada na sessão, usa o avatar padrão (id 1)
$fotoId = (isset($_SESSION['foto_id']) && $_SESSION['foto_id'] > 0) ? $_SESSION['foto_id'] : 1;
$caminhoFoto = $avatars[$fotoId];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Home - How to Fight</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Seu CSS personalizado -->
    <link rel="stylesheet" type="text/css" href="../pagina/CSS/estilo.css">
</head>

<body>

    <!-- INÍCIO DO CÓDIGO VLIBRAS -->
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    <!-- FIM DO CÓDIGO VLIBRAS -->

    <header class="htf-header">
        <div class="header-container">
            <div class="logo-brand">
                <a href="./home.php">
                    <img src="../pagina/Image/trabaio_do meu amor.png" alt="Logo">
                </a>
            </div>

            <nav class="header-nav">
                <a href="./modulos.php" class="nav-link">Módulos</a>
                <a href="./sobre.php" class="nav-link">Sobre</a>
                <a href="./contato.php" class="nav-link">Contato</a>
            </nav>

            <div class="header-actions">
                <?php if (isset($_SESSION['id_usuario'])): ?>
                    <!-- Se logado -->
                    <button class="btn-perfil" onclick="window.location.href='./perfil.php'">
                        <img src="<?php echo $caminhoFoto; ?>" 
                             alt="Ícone do perfil"  >
                            <?php echo htmlspecialchars($_SESSION['nick']); ?>
                    </button>
                    <button class="btn-logout" onclick="window.location.href='banco/logout.php'">Sair</button>                
                <?php else: ?>
                    <!-- Se não logado -->
                    <button class="btn-login" onclick="window.location.href='../pagina/HTML/login.html'">Login</button>
                    <button class="btn-signup" onclick="window.location.href='../pagina/HTML/Cadastro.html'">Cadastro</button>
                <?php endif; ?>
            </div>
        </div>
    </header>
