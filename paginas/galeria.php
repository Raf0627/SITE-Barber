<main class="main-galeria">
    <div class="titulo" data-aos="zoom-in">
        <h1>Galeria</h1>
    </div>
    <div class="mosaico-galeria">
        <?php
        include "fotos.php";
        foreach ($fotos as $dados) {
            $foto = $dados['foto'];
            echo "
                <div class='mosaico-item' data-aos='zoom-in'>
                    <a href='{$foto}' data-fslightbox='galeria'>
                        <img src='{$foto}' alt='Foto Galeria'>
                    </a>
                </div>
            ";
        }
        ?>
    </div>
</main>