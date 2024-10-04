<?php $this->layout("admin_master"); ?>
<link rel="stylesheet" href="/styles/form_class.css">
<section class="settings">
    <h2>⚔️ Adicionar Classe de RPG</h2>
    
    <form action="/admin/add-class" method="POST" class="class-form">
        <div class="form-group">
            <label for="className">Nome da Classe:</label>
            <input type="text" id="className" name="nome" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea id="description" name="descricao" required></textarea>
        </div>

        <div class="form-group">
            <label for="hitPoints">Pontos de Vida:</label>
            <input type="number" id="hitPoints" name="hitPoints" required>
        </div>

        <div class="form-group">
            <label for="mana">Mana:</label>
            <input type="number" id="mana" name="mana" required>
        </div>

        <div class="form-group">
            <label for="abilities">Habilidades:</label>
            <textarea id="abilities" name="abilities" required></textarea>
        </div>

        <button type="submit" class="btn">Adicionar Classe</button>
    </form>
</section>