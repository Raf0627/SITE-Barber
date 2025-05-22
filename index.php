<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Samuel Miranda</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

</head>

<body>
  <header id="mainHeader">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="imgs/logo.jpg" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <hr>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home">Início</a>
            </li>
            <hr>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="galeria">Galeria</a>
            </li>
            <hr>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="servicos">Serviços</a>
            </li>
            <hr>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="sobre">Sobre</a>
            </li>
            <hr>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="contato">Contato</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="background"><img src="/SITE-Barber/imgs/barbearia.jpg" alt=""></div>
    <div class="gradiente"></div>
    <?php
    //mostrar o GET
    //print_r($_GET)

    $param = $_GET["param"] ?? "home";

    $pagina = "paginas/{$param}.php";

    //verificar se este arquivo existe
    if (file_exists($pagina))
      include $pagina;
    else
      include "paginas/erro.php";
    ?>
  </main>

  <footer>
    <div class="redes">
      <div class="insta column"><i class="fa-brands fa-instagram"></i></div>
      <div class="zap column"><i class="fa-brands fa-whatsapp"></i></div>
      <div class="barber column"><img src="/SITE-Barber/imgs/app-barber.png" alt=""></div>
    </div>
    <p>Av. José C de Oliveira, 245b - Centro, Campo Mourão - PR, 87301-015</p>
    <p>©Todos os direitos reservados</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
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
  </script>
</body>

</html>