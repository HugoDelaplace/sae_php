<?php 
    require_once "connexion.php";
    $db = connectBd();
    if (isset($_GET["titre"])) {
        echo "Titre";
        $titre = $_GET["titre"];
        $description = $_GET["description"];
        $sql = "INSERT INTO QUIZZ VALUES (null , :tit, :descri)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tit', $titre);
        $stmt->bindParam(':descri', $description);
        $stmt->execute();
        $id = $db->lastInsertId();
        header("Location: quizz_cree.php?id=$id");
    }
    else {
        echo "Erreur";
    }
?>
