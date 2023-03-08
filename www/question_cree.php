<?php
require_once "connexion.php";
$db = connectBd();
$nom = $_GET["nom"];
$text = $_GET["textQuestion"];
$idQ = $_GET["idQ"];
$idType = intval($_GET["idType"], 10);
$choix = $_GET["choix"];
$reponse = $_GET["reponse"];
$score = $_GET["score"];
$sql = "INSERT INTO QUESTION VALUES (:nom, :idType, :idQ, :textQ, :choix, :reponse, :score)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':textQ', $text);
$stmt->bindParam(':idQ', $idQ);
$stmt->bindParam(':idType', $idType);
$stmt->bindParam(':choix', $choix);
$stmt->bindParam(':reponse', $reponse);
$stmt->bindParam(':score', $score);
$stmt->execute();
if ($stmt->rowCount() == 0) {
    echo "Erreur";
}
else {
    echo "Question créée";
}
header("Location: questions.php?$idQ");
?>