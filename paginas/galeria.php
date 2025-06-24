<main class="main-galeria">
  <div class="titulo" data-aos="zoom-in">
    <h1>Galeria</h1>
  </div>
  <div class="galeria-fotos">
    <div class="container-galeria" data-aos="fade-up">
      <?php
      include "fotos.php";
  
      foreach ($fotos as $dados) {
        $foto = $dados['foto'];
        echo "
    <div class='column'><a href='{$foto}' data-fslightbox='gallery'><img src='{$foto}' alt=''></a></div>
          ";
      }
      ?>
    </div>

  </div>
</main>