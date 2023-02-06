<?php 
    require_once "connexion.php";
    $db = connectBd();
    if (isset($_GET["titre"]) && isset($_GET["description"]) && isset($_GET["nb_questions"])) {
        $titre = $_GET["titre"];
        $description = $_GET["description"];
        $nb_questions = $_GET["nb_questions"];
        $sql = "INSERT INTO quizz (titreQ, descriptionQ, nb_questions) VALUES ('$titre', '$description', '$nb_questions')";
        $db->exec($sql);
        $id = $db->lastInsertId();
        echo "Quizz créé";
        header("Location: quizz_cree.php?id=$id");
    }
    else {
        echo "Erreur";
        header("Location: creer_quizz.php");
    }
?>
