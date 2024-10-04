<?php $this->layout("master"); ?>
<link rel="stylesheet" href="/styles/classes.css">
<?php 
$url = 'https://www.dnd5eapi.co/api/classes/'.htmlspecialchars($className); 
$jsonData = file_get_contents($url);
$classData = json_decode($jsonData, true);

if ($classData) {
    $name = $classData['name'];
    $hitDie = $classData['hit_die'];
    $proficiencies = $classData['proficiency_choices'];
} else {
    echo "Erro ao obter dados da classe.";
    exit;
}
?>
<link rel="stylesheet" href="styles/class.css">

<div class="class-container">
    <header>
        <h1><?php echo $name; ?></h1>
        <p class="hit-die"><strong>Dado de Vida:</strong> d<?php echo $hitDie; ?></p>
    </header>

    <section class="proficiencies">
        <h2>Escolhas de Proficiência:</h2>
        <?php foreach ($proficiencies as $proficiency): ?>
        <div class="proficiency-group">
            <h3><?php echo $proficiency['desc']; ?></h3>
            <ul>
                <?php
                        foreach ($proficiency['from']['options'] as $option) {
                            echo "<li class='proficiency-item'>" . $option['item']['name'] . "</li>";
                        }
                        ?>
            </ul>
        </div>
        <?php endforeach; ?>
    </section>
</div>