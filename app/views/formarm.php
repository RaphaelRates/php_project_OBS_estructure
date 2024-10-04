<?php $this->layout("admin_master"); ?>
<link rel="stylesheet" href="/styles/form_arms.css">

<header>
        <h1>Cadastro de Armas de RPG</h1>
    </header>
    <main>
        <form action="/admin/add-arm" method="POST" class="arma-form">
            <fieldset>
                <legend>Informações da Arma</legend>
                
                <label for="nome">Nome da Arma:</label>
                <input type="text" id="nome" name="nome" required>
                
                <label for="tipo">Tipo de Arma:</label>
                <select id="tipo" name="tipo" required>
                    <option value="Espada">Espada</option>
                    <option value="Arco">Arco</option>
                    <option value="Machado">Machado</option>
                    <option value="Clava">Clava</option>
                    <option value="Adaga">Adaga</option>
                </select>
                
                <label for="dano">Dano:</label>
                <input type="number" id="dano" name="dano" required>
                
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="4"></textarea>

                <input type="submit" value="Cadastrar Arma">
            </fieldset>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 RPG Creator. Todos os direitos reservados.</p>
    </footer>