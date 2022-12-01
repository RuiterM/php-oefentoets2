
<?php
$melding = "";
$db = new PDO('mysql:host=localhost;dbname=cijfersysteem',
    "root" . "");
if (isset($_POST["verzenden"])) {
    if (!empty($_POST['leerling']) || !empty($_POST['vak']) || !empty($_POST['cijfer']) || !empty($_POST['adres']) || !empty($_POST['telefoonnummer'])) {

        $leerling = filter_input(INPUT_POST, 'leerling');
        $vak = filter_input(INPUT_POST, 'vak');
        $adres = filter_input(INPUT_POST, 'adres');
        $telefoonnummer = filter_input(INPUT_POST, 'telefoonnummmer');
        $cijfer = filter_input(INPUT_POST, 'cijfer', FILTER_VALIDATE_FLOAT);

        if ($cijfer > 10.0 || $cijfer < 1.0) {
            $melding = "Het getal moet tussen de 1.0 en 10.0 zitten!";
        } if (!strlen($telefoonnummer == 10)) {
            $melding = "voeg een geldig telefoonnummer in!";
        }else {

            $leerling = $_POST['leerling'];
            $vak = $_POST['vak'];
            $cijfer = $_POST['cijfer'];
            $adres = $_POST['adres'];
            $telefoonnummer = $_POST['telefoonnummer'];


            $query = $db->prepare(
                "INSERT INTO resultaten(leerling,vak,cijfer,adres,telefoonnummer) VALUES (:leerling, :vak, :cijfer, :adres, :telefoonnummer)");

            $query->bindParam("leerling", $leerling);
            $query->bindParam("vak", $vak);
            $query->bindParam("cijfer", $cijfer);
            $query->bindParam("adres", $adres);
            $query->bindParam("telefoonnummer", $telefoonnummer);
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
            prijs: <input type="text" name="cijfer" placeholder="cijfer"><br>
            adres: <input type="text" name="adres" placeholder="adres"><br>
            telefoonnummer: <input type="text" name="telefoonnummer" placeholder="telefoonnummer"><br><br>

            <input class="btn btn-dark" type="submit" name="verzenden" value="Verzend!"><br>
            <br><?php echo $melding . "<br>"; ?>
            <br>
            <a href="index.php">Terug</a>
        </form>
    </div>
</h4>
