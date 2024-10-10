<?php $this->layout("admin_master"); ?>
<link rel="stylesheet" href="/styles/form_classes.css">
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

    <h2>Classes Existentes</h2>
    <table>
        <thead>
            <tr>
                <th>Nome da Classe</th>
                <th>Descrição</th>
                <th>Pontos de Vida</th>
                <th>Mana</th>
                <th>Habilidades</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include __DIR__."/../models/ClasseModel.php";
            use App\Models\ClasseModel;
            $modelo = new ClasseModel();
            $classes = $modelo->getClasses(); 

            foreach ($classes as $classe):
            ?>
                <tr>
                    <td><?= htmlspecialchars($classe['nome']) ?></td>
                    <td><?= htmlspecialchars($classe['descricao']) ?></td>
                    <td><?= htmlspecialchars($classe['hitpoints']) ?></td>
                    <td><?= htmlspecialchars($classe['mana']) ?></td>
                    <td><?= htmlspecialchars($classe['habilidades']) ?></td>
                    <td>
                        <form action="/admin/update-class" method="GET" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $classe['id'] ?>">
                            <button type="submit" class="btn-action">Edit</button>
                        </form>
                        <form action="/admin/delete-class" method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $classe['id'] ?>">
                            <button type="submit" class="btn-action">Dell</button>
                        </form>
                        <form action="/admin/view-class" method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $classe['id'] ?>">
                            <button type="submit" class="btn-action">See</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>