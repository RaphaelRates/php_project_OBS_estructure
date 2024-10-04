<?php $this->layout("master"); ?>

<?php 
$url = 'https://www.dnd5eapi.co/api/equipment/' . htmlspecialchars($weaponName); 

// Obtém os dados JSON da URL
$jsonData = file_get_contents($url);
$weaponData = json_decode($jsonData, true);

if ($weaponData) {
    // Extraindo os dados da arma
    $name = $weaponData['name'];
    $equipmentCategory = $weaponData['equipment_category']['name'];
    $weaponCategory = $weaponData['weapon_category'];
    $weaponRange = $weaponData['weapon_range'];
    $costQuantity = $weaponData['cost']['quantity'];
    $costUnit = $weaponData['cost']['unit'];
    $weight = $weaponData['weight'];
    $damageDice = $weaponData['damage']['damage_dice'];
    $damageType = $weaponData['damage']['damage_type']['name'];
    $properties = $weaponData['properties'];
} else {
    echo "Erro ao obter dados da arma.";
    exit;
}
?>

<link rel="stylesheet" href="/styles/arms.css">

<div class="weapon-container">
    <header>
        <h1><?php echo $name; ?></h1>
        <p><strong>Categoria:</strong> <?php echo $equipmentCategory; ?></p>
        <p><strong>Tipo de Arma:</strong> <?php echo $weaponCategory; ?></p>
        <p><strong>Alcance:</strong> <?php echo $weaponRange; ?></p>
        <p><strong>Custo:</strong> <?php echo $costQuantity . ' ' . $costUnit; ?></p>
        <p><strong>Peso:</strong> <?php echo $weight; ?> lb</p>
    </header>

    <section class="weapon-details">
        <h2>Dados de Dano</h2>
        <p><strong>Dano:</strong> <?php echo $damageDice; ?> (<?php echo $damageType; ?>)</p>

        <h2>Propriedades</h2>
        <ul>
            <?php foreach ($properties as $property): ?>
            <li><?php echo $property['name']; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
</div>