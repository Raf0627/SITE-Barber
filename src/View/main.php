<?php

//$base = "http://{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}";

// Carrega o autoloader do Composer
require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();


session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sam Barber</title>
  <!-- <base href="<?= $base ?>"> -->
  <link rel="icon" href="imgs/sam-barber-min.png" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/all.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

</head>

<body>
  <header id="mainHeader">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php" title="início">
          <img src="../imgs/sambarber-logo.png" alt="Logo SamBarber">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <hr>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php" title="início"><i class="fa-solid fa-house"></i>Início</a>
            </li>
            <hr>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="sobre.php" title="sobre"><i class="fa-solid fa-circle-info"></i>Sobre</a>
            </li>
            <hr>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="galeria.php" title="galeria"><i class="fa-solid fa-image"></i>Galeria</a>
            </li>
            <hr>
            <li class="nav-item">
              <a class="nav-link active nav-servicos" aria-current="page" href="servicos.php" title="serviços"><i class="fa-solid fa-scissors"></i>Serviços</a>
            </li>
            <hr>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="contato.php" title="contato"><i class="fa-solid fa-phone"></i>Contato</a>
            </li>
            <hr>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="dashboard.php" title="dashboard"><i class="fa-solid fa-phone"></i>Dashboard</a>
            </li>
            <hr>
            <?php
            if (isset($_SESSION['id'])) {
            ?>
              <li><a href=""><?php echo $_SESSION['nome']; ?></a></li>
              <li><a href="logoutIncludes.php">Logout</a></li>
            <?php
            } else {
            ?>
              <hr>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="conta.php" title="conta"><i class="fa-solid fa-phone"></i>Conta</a>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="background bg-desktop">
    <img src="../imgs/barber.jpg" alt="barbearia-fundo">
  </div>
  <div class="background bg-mobile">
    <img src="../imgs/barberMb.jpg" alt="barbearia-fundo-mobile">
  </div>
  <div class="gradiente"></div>
  <main>
    <?php include __DIR__ . "/{$page}" ?>
  </main>

  <footer>
    <div class="redes">
      <div class="insta column">
        <a href="https://www.instagram.com/samuelmirandasiqueira?igsh=MWM2aWE4czhndDlvbA==" target="_blank" title="Instagram Samuel Miranda">
          <i class="fa-brands fa-instagram" aria-label="Instagram"></i>
        </a>
      </div>
      <div class="zap column">
        <a href="https://wa.me/554498264244" target="_blank" rel="" title="WhatsApp Samuel Miranda">
          <i class="fa-brands fa-whatsapp" aria-label="WhatsApp"></i>
        </a>
      </div>
      <div class="barber column">
        <a href="https://sites.appbarber.com.br/pt-br/goldenline" target="_blank" title="Agendar pelo AppBarber">
          <img src="../imgs/app-barber.png" alt="Logo AppBarber">
        </a>
      </div>
    </div>
    <p>Av. José C de Oliveira, 245b - Centro, Campo Mourão - PR, 87301-015</p>
    <div class="img-footer">
      <img src="../imgs/sambarber-logo.png" alt="Logo SamBarber">
    </div>
    <p>© Desenvolvido por Rafael Frossard</p>
  </footer>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/parsley.min.js"></script>
  <script src="js/sweetalert2.all.min.js"></script>
  <script src="js/fslightbox.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script>
    AOS.init({
      offset: 40,
    });
    let lastScroll = 0;
    const header = document.getElementById('mainHeader');

    window.addEventListener('scroll', function() {
      const currentScroll = window.pageYOffset;
      if (currentScroll > lastScroll && currentScroll > 60) {
        // Descendo
        header.classList.add('hide-header');
      } else {
        // Subindo
        header.classList.remove('hide-header');
      }
      lastScroll = currentScroll;
    });

    $(document).ready(function() {
      $("#tel").mask("(00) 00000-0000");
    });
  </script>
</body>

</html>