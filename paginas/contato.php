<main class="main-contato">
    <div class="formas-contato">
        <div class="titulo titulo-contato" data-aos="zoom-in">
            <h1>Contato</h1>
        </div>
        <form data-aos="fade-up" data-parsley-validate autocomplete="off" action="https://formspree.io/f/mzzgjnoy" method="POST">
            <div class="formulario">
                <div class="nome-tel">
                    <div class="class-nome">
                        <label for="nome" class="label-nome">Nome:</label>
                        <input name="nome" class="input-nome" type="text" placeholder="Ex: Nome" required required
                            data-parsley-required-message="Digite um nome!">
                    </div>
                    <div class="class-tel">
                        <label class="label-tel" for="numb">Nº de telefone:</label>
                        <input id="tel" name="telefone" type="text" placeholder="Ex: (99) 99999 9999" required
                            data-parsley-required-message="Digite um número de telefone!" data-parsley-minlength="15"
                            data-parsley-minlength-message="Digite um número de telefone! válido">
                    </div>
                </div>
                <label for="numb">E-mail:</label>
                <input name="email" type="email" placeholder="Ex: nome@email.com" required
                    data-parsley-required-message="Digite um e-mail!"
                    data-parsley-type-message="Digite um e-mail válido!">
                <div class="avaliacao">
                    <div class="servico-site">
                        <label for="servico">Serviço:</label>
                        <div class="star-rating" data-rating="servico">
                            <span class="star" data-value="1">★</span>
                            <span class="star" data-value="2">★</span>
                            <span class="star" data-value="3">★</span>
                            <span class="star" data-value="4">★</span>
                            <span class="star" data-value="5">★</span>
                        </div>
                        <input type="hidden" name="avaliacao_servico" id="avaliacao_servico" value="Não avaliado">
                    </div>
                    <div class="servico-site">
                        <label for="site">Site:</label>
                        <div class="star-rating" data-rating="site">
                            <span class="star" data-value="1">★</span>
                            <span class="star" data-value="2">★</span>
                            <span class="star" data-value="3">★</span>
                            <span class="star" data-value="4">★</span>
                            <span class="star" data-value="5">★</span>
                        </div>
                        <input type="hidden" name="avaliacao_site" id="avaliacao_site" value="Não avaliado">
                    </div>
                </div>
                <div class="opcoes-pai">
                    <textarea name="mensagem" id="mensagem" placeholder="Digite sua mensagem..." required data-parsley-required-message="Mensagem obrigatória"></textarea>
                </div>
                <button type="submit" id="btn-email" class="btn btn-lg">Enviar <i class="fa-regular fa-envelope"></i></button>
            </div>
            <div class="opcao-2">
                <div class="contato-title"><i class="fa-solid fa-comments"></i> Fale direto comigo!</div>
                <div class="contato-desc">
                    Prefere um contato mais direto? Clique abaixo e fale comigo pelo WhatsApp ou Instagram.<br>
                </div>
                <div class="contato-btns">
                    <a class="zap-link" href="https://wa.me/554498264244" target="_blank" title="WhatsApp Samuel Miranda">
                        <i class="fa-brands fa-whatsapp"></i> WhatsApp
                    </a>
                    <a class="insta-link" href="https://www.instagram.com/samuelmirandasiqueira?igsh=MWM2aWE4czhndDlvbA==" target="_blank" title="Instagram Samuel Miranda">
                        <i class="fa-brands fa-instagram"></i> Instagram
                    </a>
                </div>
            </div>
        </form>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const starRatings = document.querySelectorAll('.star-rating');

        starRatings.forEach(rating => {
            const stars = rating.querySelectorAll('.star');
            const ratingType = rating.getAttribute('data-rating');
            const hiddenInput = document.getElementById(`avaliacao_${ratingType}`);

            // Hover effect
            stars.forEach((star, index) => {
                star.addEventListener('mouseenter', () => {
                    highlightStars(stars, index + 1);
                });

                star.addEventListener('click', () => {
                    const ratingValue = index + 1;
                    hiddenInput.value = ratingValue;
                    setActiveStars(stars, ratingValue);
                });
            });

            // Reset hover effect when mouse leaves the rating container
            rating.addEventListener('mouseleave', () => {
                const currentRating = parseInt(hiddenInput.value);
                if (currentRating > 0) {
                    setActiveStars(stars, currentRating);
                } else {
                    resetStars(stars);
                }
            });
        });

        function highlightStars(stars, count) {
            stars.forEach((star, index) => {
                if (index < count) {
                    star.style.color = 'orange';
                } else {
                    star.style.color = '#ddd';
                }
            });
        }

        function setActiveStars(stars, count) {
            stars.forEach((star, index) => {
                if (index < count) {
                    star.classList.add('active');
                    star.style.color = 'orange';
                } else {
                    star.classList.remove('active');
                    star.style.color = '#ddd';
                }
            });
        }

        function resetStars(stars) {
            stars.forEach(star => {
                star.style.color = '#ddd';
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form[data-parsley-validate]');
        if (form) {
            form.addEventListener('submit', function(e) {
                if (!$(form).parsley().isValid()) {
                    e.preventDefault();
                    Swal.fire({
                        text: 'Preencha todos os campos corretamente!',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn-agendar'
                        }
                    });
                }
            });
        }
    });
</script>