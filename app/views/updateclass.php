<?php $this->layout("admin_master"); ?>
<link rel="stylesheet" href="/styles/form_classes.css">
<section class="settings">
    <h2>🛠️ Atualizar Classe de RPG</h2>

    <form action="/admin/update-class" method="POST" class="class-form">
        <input type="hidden" name="id" value="<?= htmlspecialchars($class['id']) ?>">

        <div class="form-group">
            <label for="className">Nome da Classe:</label>
            <input type="text" id="className" name="nome" value="<?= htmlspecialchars($class['nome']) ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea id="description" name="descricao" required><?= htmlspecialchars($class['descricao']) ?></textarea>
        </div>

        <div class="form-group">
            <label for="hitPoints">Pontos de Vida:</label>
            <input type="number" id="hitPoints" name="hitPoints" value="<?= htmlspecialchars($class['hitpoints']) ?>" required>
        </div>

        <div class="form-group">
            <label for="mana">Mana:</label>
            <input type="number" id="mana" name="mana" value="<?= htmlspecialchars($class['mana']) ?>" required>
        </div>

        <div class="form-group">
            <label for="abilities">Habilidades:</label>
            <textarea id="abilities" name="abilities" required><?= htmlspecialchars($class['habilidades']) ?></textarea>
        </div>

        <button type="submit" class="btn">Atualizar Classe</button>
    </form>
</section>