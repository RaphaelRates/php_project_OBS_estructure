<?php $this->layout("admin_master"); ?>
<?php

if (!isset($_SESSION['usuarios'])) {
    $_SESSION['usuarios'] = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $equipe = $_POST['equipe'] ?? '';
    $classe = $_POST['classe'] ?? '';
    $arma = $_POST['arma'] ?? '';
    $nivel = (int) ($_POST['nivel'] ?? 1);

    if ($nome && $equipe && $classe && $arma && $nivel) {
        $_SESSION['usuarios'][] = [
            'nome' => $nome,
            'equipe' => $equipe,
            'classe' => $classe,
            'arma' => $arma,
            'nivel' => $nivel
        ];
    }
}
?>
<link rel="stylesheet" href="/styles/users_mesa.css">
<header>
        <h1>Gerenciamento de Usuários de RPG</h1>
    </header>
    <main>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="equipe">Equipe:</label>
            <input type="text" id="equipe" name="equipe" required>

            <label for="classe">Classe:</label>
            <input type="text" id="classe" name="classe" required>

            <label for="arma">Arma:</label>
            <input type="text" id="arma" name="arma" required>

            <label for="nivel">Nível:</label>
            <input type="number" id="nivel" name="nivel" min="1" value="1" required>

            <button type="submit">Adicionar Usuário</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Equipe</th>
                    <th>Classe</th>
                    <th>Arma</th>
                    <th>Nível</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['usuarios'] as $usuario): ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario['nome']) ?></td>
                        <td><?= htmlspecialchars($usuario['equipe']) ?></td>
                        <td><?= htmlspecialchars($usuario['classe']) ?></td>
                        <td><?= htmlspecialchars($usuario['arma']) ?></td>
                        <td><?= htmlspecialchars($usuario['nivel']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2024 RPG Manager. Todos os direitos reservados.</p>
    </footer>