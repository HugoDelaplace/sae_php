<?php
require_once "connexion.php";
$db = connectBd();
$titre = $_GET["titre"];
$description = $_GET["description"];
$sql = "INSERT INTO QUIZZ VALUES (null , :tit, :descri)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':tit', $titre);
$stmt->bindParam(':descri', $description);
$stmt->execute();
if ($stmt->rowCount() == 0) {
    echo "Erreur";
    header("Location: creer_quizz.php");
}
else {
    echo "Quizz créé";
}
$id = $db->lastInsertId();
header("Location: new_quizz.php");
?>