<?php 
    require_once "connexion.php";
    $db = connectBd();
    if (!empty($_GET["titre"]) && !empty($_GET["nb_quest"])) {
        $titre = $_GET["titre"];
        $description = $_GET["description"];
        $nb_questions = $_GET["nb_quest"];
        $sql = "INSERT INTO QUIZZ (titreQ, descriptionQ, nb_questions) VALUES (:titre, :descri, :nb_q)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(':titre' => $titre, ':descri' => $description, ':nb_q' => $nb_questions));
        if (!$stmt)
            echo "Pb de requete";
        else {
            echo "Quizz ajouté";
        }
        $id = $db->lastInsertId();
        echo "Quizz créé";
        header("Location: quizz_cree.php?id=$id");
    }
    else {
        echo "Erreur";
    }
?>
