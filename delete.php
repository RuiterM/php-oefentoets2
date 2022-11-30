<?php
$db = new PDO('mysql:host=localhost;dbname=cijfersysteem',
    "root" . "");
$query = $db->prepare("select * FROM resultaten");
$query->execute();
$cijfers = $query->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id'])) {
    $id=filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $query = $db->prepare("DELETE FROM resultaten WHERE id=:id");
    $query->bindParam("id",$id);
    $query->execute();
    header('location:index.php');
}
?>
