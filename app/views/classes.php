<?php
$apiUrl = "https://www.dnd5eapi.co/api/classes";
$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

$this->layout("master"); 
?>

<link rel="stylesheet" href="styles/classes.css">

<section class="classes">
    <h2>Classes Disponíveis</h2>
    <div class="class-cards">
        <?php
        if (isset($data['results']) && count($data['results']) > 0) {
            foreach ($data['results'] as $dndClass) {
                echo '<div class="class-card" onclick="window.location.href=\'/classes/' . $dndClass['index'] . '\'">';
                echo '<h3>' . htmlspecialchars($dndClass['name']) . '</h3>';
                echo '<p>Veja mais detalhes sobre a classe ' . htmlspecialchars($dndClass['name']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Não foi possível carregar as classes.</p>';
        }
        ?>
    </div>
</section>
