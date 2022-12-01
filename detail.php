<?php
$db = new PDO('mysql:host=localhost;dbname=cijfersysteem',
    "root" . "");
$query = $db->prepare("select * FROM resultaten WHERE id =" . $_GET['id']);
$query->execute();
$cijfers = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($cijfers as $cijfer) {
    echo "Naam: " . $cijfer['leerling'] . "<br>";
    echo "Adres: " . $cijfer['adres'] . "<br>";
    echo "Telefoonnummer: ". $cijfer['telefoonnummer'] . "<br><br>";
}
?>
<a href="index.php">Terug</a>
