<?php
$db = new PDO('mysql:host=localhost;dbname=cijfersysteem',
    "root" . "");
$query = $db->prepare("select * FROM resultaten");
$query->execute();
$cijfers = $query->fetchAll(PDO::FETCH_ASSOC);
$teller = 1;

echo "<div class='container'>";
echo "<table>";
echo "<tr>";
echo "<td style='border: solid black 2px'>Nummer</td>";
echo "<td style='border: solid black 2px'>Leerling</td>";
echo "<td style='border: solid black 2px'>Vak</td>";
echo "<td style='border: solid black 2px'>Cijfer</td>";


echo "</tr>";
foreach ($cijfers as $cijfer) {
    echo "<tr>";
    echo "<td style='border: solid black 2px'>". $teller ."</td>";
    echo "<td style='border: solid black 2px'>". $cijfer['leerling'] ."</td>";
    echo "<td style='border: solid black 2px'>".$cijfer['vak'] ."</td>";
    echo "<td style='border: solid black 2px'>".$cijfer['cijfer'] ."</td>";
    echo "<td>";
    echo "<a href='update.php?id=".$cijfer['id']. "'>";
    echo "Update";
    echo "</a><br>";
    echo "</td>";
    echo "<td style='padding-left: 10px'>";
    echo "<a href='delete.php?id=".$cijfer['id']. "'>";
    echo "Delete";
    echo "</a><br>";
    echo "</td>";
    echo "</tr>";
    $teller++;
}
echo "</table>";

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form method="post">
    <br>
    <br>
    <a href="insert.php" class="btn btn-dark">Voeg een leerling toe!</a>
    </div>
</form>
</body>
</html>


