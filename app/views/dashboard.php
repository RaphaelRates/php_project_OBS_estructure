<?php $this->layout("admin_master"); ?>
<link rel="stylesheet" href="/styles/admin_dashboard.css">
<section>
    <h2>Admin Dashboard</h2>
    
    <div class="dashboard-container">

        <div class="dashboard-card">
            <h3>👥 Usuários</h3>
            <p>Visualize e gerencie os usuários registrados.</p>
            <a href="/admin/users" class="btn">Ver Usuários</a>
        </div>

        <div class="dashboard-card">
            <h3>Adicionar classe</h3>
            <p>Inserir uma classe ao RPG</p>
            <a href="/admin/add-class" class="btn">Inserir Classe</a>
        </div>
        <div class="dashboard-card">
            <h3>Adicionar Usuario</h3>
            <p>Inserir um novo jogador á mesa</p>
            <a href="/admin/add-user" class="btn">Inserir Jogador</a>
        </div>
        <div class="dashboard-card">
            <h3>Adicionar Arma</h3>
            <p>Inserir uma nova arma á mesa</p>
            <a href="/admin/add-arm" class="btn">Inserir Arma</a>
        </div>
    </div>
</section>