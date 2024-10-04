<?php
$apiUrl = "https://www.dnd5eapi.co/api/equipment-categories/weapon";
$response = file_get_contents($apiUrl);


$data = json_decode($response, true);

$this->layout("master"); 
?>

<link rel="stylesheet" href="styles/arms.css">

<section class="weapons">
    <h2>Armas Disponíveis</h2>
    <div class="weapon-cards">
        <?php
        if (isset($data['equipment']) && count($data['equipment']) > 0) {
            foreach ($data['equipment'] as $weapon) {
                echo '<div class="weapon-card" onclick="window.location.href=\'/weapon/' . $weapon['index'] . '\'">';
                echo '<h3>' . htmlspecialchars($weapon['name']) . '</h3>';
                echo '<p>Veja mais detalhes sobre a arma ' . htmlspecialchars($weapon['name']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Não foi possível carregar as armas.</p>';
        }
        ?>
    </div>
</section>