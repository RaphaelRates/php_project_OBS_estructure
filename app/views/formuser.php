<?php $this->layout("admin_master"); ?>
<link rel="stylesheet" href="/styles/form_user.css">
<section class="add-player">
    <h2>🕹️ Adicionar Jogador</h2>

    <form class="/admin/add-user" action="/admin/add-player" method="POST">
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email (Google):</label>
            <input type="text" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="character-class">Classe de RPG:</label>
            <select id="character-class" name="character_class" required>
                <option value="">Selecione uma classe</option>
                <option value="guerreiro">Guerreiro</option>
                <option value="mago">Mago</option>
                <option value="arqueiro">Arqueiro</option>
                <!-- Adicione mais classes conforme necessário -->
            </select>
        </div>

        <div class="form-group">
            <label for="level">Nível:</label>
            <input type="number" id="level" name="level" min="1" required>
        </div>

        <button type="submit" class="btn">Adicionar Jogador</button>
    </form>
</section>