<?php $this->layout("admin_master"); ?>
<link rel="stylesheet" href="/styles/settings.css">
<section class="update-settings">
    <h2>🔧 Atualizar Configurações</h2>

    <form action="/admin/update-settings" method="POST" class="update-form">
        <div class="form-group">
            <label for="site-name">Nome do Site:</label>
            <input type="text" id="site-name" name="site_name" required>
        </div>

        <div class="form-group">
            <label for="site-email">Email de Contato:</label>
            <input type="email" id="site-email" name="site_email" required>
        </div>

        <div class="form-group">
            <label for="site-description">Descrição do Site:</label>
            <textarea id="site-description" name="site_description" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn">Salvar Configurações</button>
    </form>
</section>