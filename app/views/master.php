<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/index.css">
    <link rel="stylesheet" href="/styles/header.css">
    <title>Wiki RPG</title>
</head>

<body>
    <header>
        <h1>Bem-vindo à Wiki RPG</h1>
        <?php if (isset($_SESSION['user_email'])): ?>
        <link rel="stylesheet" href="/styles/header.css">
        <div class="user-info">
            <p style="font-size:12px;">Bem-vindo, <?= htmlspecialchars($_SESSION['user_name']); ?>!</p>
            <img src='<?= htmlspecialchars($_SESSION['user_picture']); ?>' alt="Foto de Perfil"
                style="border-radius: 50px; width: 50px; height: 50px;" />
            <p style="font-size:12px;">Você está logado com o e-mail: <?= htmlspecialchars($_SESSION['user_email']); ?>
            </p>
            <a style="display: inline-block; padding: 10px 15px; background-color: #ff4d4d; 
          color: white; text-decoration: none; border-radius: 5px; font-weight: bold; 
          transition: background-color 0.3s ease;" class="logout-link" href="/logout">
                <style>
                .logout-link:hover, a[href="/admin"] {
                    background-color: #ff3333;
                    transform: scale(1.05);
                }
                </style>
                Logout
            </a>
            <a href="/admin" style="color: #fff; background-color: #007bff; 
            padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;"
            >Administrador
        </a>
        </div>
        <?php else: ?>
        <div class="login-info">
            <p>Você não está logado.</p>
            <div><a class="google-link" href="/login/google">Login com Google</a></div>
        </div>
        <?php endif; ?>

        <nav class="menu-desktop">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/classes">Classes</a></li>
                <li><a href="/weapon">Armas</a></li>
            </ul>
        </nav>
        <nav class="menu-mobile">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/classes">Classes</a></li>
                <li><a href="/weapon">Armas</a></li>
            </ul>
        </nav>
    </header>

    <?= $this->section("content"); ?>
</body>

</html>