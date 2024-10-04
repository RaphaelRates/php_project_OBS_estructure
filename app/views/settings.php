<?php $this->layout("admin_master"); ?>
<link rel="stylesheet" href="/styles/settings.css">
<section class="settings">
    <h2>⚙️ Configurações</h2>

    <div class="settings-container">
        <div class="settings-card">
            <h3>Gerenciar Perfis</h3>
            <p>Visualize e gerencie os perfis dos usuários.</p>
            <a href="/admin/manage-profiles" class="btn">Ir para Perfis</a>
        </div>

        <div class="settings-card">
            <h3>Configurações de Segurança</h3>
            <p>Atualize as configurações de segurança do sistema.</p>
            <a href="/admin/security-settings" class="btn">Segurança</a>
        </div>

        <div class="settings-card">
            <h3>Configurações de Notificação</h3>
            <p>Gerencie as preferências de notificação.</p>
            <a href="/admin/notification-settings" class="btn">Notificações</a>
        </div>
    </div>
</section>