<?php require_once "base.html";?>
<body class="quizz">
    <h1>Liste des questions du Quiz</h1>
    <ul>
    <?php require "connexion.php";
        $db = connectBd();
        $sql = "SELECT * FROM QUESTION where idQ = $id";
        $result = $db->query($sql);
        $question = $result->fetchAll();
        foreach ($question as $q) {
            $idQ = $q["idQ"];
            $nom = $q["nom"];
            $idType = $q["idType"];
            $text = $q["textQuestion"];
            $choix = $q["choix"];
            $reponse = $q["reponse"];
            $score = $q["score"];
            echo "<li></li>";
        }