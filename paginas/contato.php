<div class="container mt-5 mb-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Fale Conosco</h2>
    <form method="post" action="#">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="tel" class="form-control" id="telefone" name="telefone" required placeholder="(99) 99999-9999" pattern="\(\d{2}\)\s?\d{4,5}-\d{4}">
        </div>
        <button type="submit" class="btn btn-primary w-100">Enviar</button>
    </form>
</div>