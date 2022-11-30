<?php
$melding = "";
$db = new PDO('mysql:host=localhost;dbname=cijfersysteem',
    "root" . "");
if (isset($_POST['verzenden'])) {

    $leerling = filter_input(INPUT_POST, 'leerling');
    $vak = filter_input(INPUT_POST, 'vak');
    $cijfer = filter_input(INPUT_POST, 'cijfer', FILTER_VALIDATE_FLOAT);



    $query = $db->prepare("UPDATE resultaten SET leerling = :leerling, vak = :vak, cijfer = :cijfer WHERE id = :id");

    $query->bindParam("leerling", $leerling);
    $query->bindParam("vak", $vak);
    $query->bindParam("cijfer", $cijfer);
    $query->bindParam("id",$_GET['id']);



    if ($cijfer > 10.0 || $cijfer < 1.0) {
        $melding = "Het getal moet tussen de 1.0 en 10.0 zitten!";
    }elseif ($query->execute()) {
        $melding = "De gegeven zijn geUpdate!";
        header('Location: index.php');
    } else {
        $melding = "Er is een fout opgetreden!";
    }
}else{
    $db = new PDO('mysql:host=localhost;dbname=cijfersysteem',
        "root" . "");
    $query = $db->prepare("select * FROM resultaten WHERE id =" . $_GET['id']);
    $query->execute();
    $cijfers = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($cijfers as $cijfer) {
        $leerling = $cijfer['leerling'];
        $vak = $cijfer['vak'];
        $cijfer = $cijfer['cijfer'];
    }
}

?>

<h4>
    <div class="container">
        <form method="post">
            <label>leerling</label>
            <input type="text" name="leerling" value="<?php echo $leerling; ?>"><br>
            <label>vak</label>
            <input type="text" name="vak" value="<?php echo $vak; ?>"><br>
            <label>cijfer</label>
            <input type="text" name="cijfer" value="<?php echo $cijfer; ?>"><br>
            <input type="submit" name="verzenden" value="Opslaan"><br><br>
            <?php echo $melding; ?>
        </form>
    </div>
</h4>

