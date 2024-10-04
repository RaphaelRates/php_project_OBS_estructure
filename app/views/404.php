<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Times New Roman', serif;
    background: url('https://www.caixinhaquantica.com.br/wp-content/uploads/2022/04/CAPA.jpg') no-repeat center center fixed;
    background-size: cover;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    text-align: center;
    background: rgba(0, 0, 0, 0.7);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
}

.notfound h1 {
    font-size: 48px;
    margin-bottom: 20px;
    text-shadow: 2px 2px 5px #000;
}

.notfound p {
    font-size: 22px;
    margin-bottom: 30px;
    text-shadow: 1px 1px 3px #000;
}

.btn-return {
    font-size: 18px;
    padding: 10px 20px;
    background-color: #b22222;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    border: 2px solid #fff;
    transition: background-color 0.3s ease;
}

.btn-return:hover {
    background-color: #8b0000;
    border-color: #ff6347;
}

.btn-return:active {
    background-color: #7c0000;
}
</style>
<div class="container">
    <div class="notfound">
        <h1>404 - Rota Não Encontrada</h1>
        <p>Você se aventurou por uma rota desconhecida. O caminho que busca não existe!</p>
        <a href="/" class="btn-return">Voltar para a Taverna</a>
    </div>
</div>