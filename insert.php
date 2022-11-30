
<?php
$melding = "";
$db = new PDO('mysql:host=localhost;dbname=cijfersysteem',
    "root" . "");
if (isset($_POST["verzenden"])) {
    if (!empty($_POST['leerling']) && !empty($_POST['vak']) && !empty($_POST['cijfer'])) {

        $leerling = filter_input(INPUT_POST, 'leerling');
        $vak = filter_input(INPUT_POST, 'vak');
        $cijfer = filter_input(INPUT_POST, 'cijfer', FILTER_VALIDATE_FLOAT);

        if ($cijfer > 10.0 || $cijfer < 1.0) {
            $melding = "Het getal moet tussen de 1.0 en 10.0 zitten!";
        }else {

            $leerling = $_POST['leerling'];
            $vak = $_POST['vak'];
            $cijfer = $_POST['cijfer'];

            $query = $db->prepare(
                "INSERT INTO resultaten(leerling,vak,cijfer) VALUES (:leerling, :vak, :cijfer)");

            $query->bindParam("leerling", $leerling);
            $query->bindParam("vak", $vak);
            $query->bindParam("cijfer", $cijfer);
            if ($query->execute()) {
                $melding = "Gegevens zijn toegevoegd!";

            }
        }

    }else {
        $melding = "Vul alles in!";
    }
}
?>


<h4>
    <div class="container">
        <form method="post">
            merk: <input type="text" placeholder="leerling" name="leerling"><br>
            model: <input type="text" name="vak" placeholder="vak"><br>
            prijs: <input type="text" name="cijfer" placeholder="cijfer"><br><br>

            <input class="btn btn-dark" type="submit" name="verzenden" value="Verzend!"><br>
            <br><?php echo $melding . "<br>"; ?>
            <br>
            <a href="index.php">Terug</a>
        </form>
    </div>
</h4>
