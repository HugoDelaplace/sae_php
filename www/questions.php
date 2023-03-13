<?php require_once "base.html"; ?>

<body class="quizz">
    <h1>Liste des questions du Quiz</h1>
    <ul>
        <?php require "connexion.php";
        $db = connectBd();
        $id = $_GET["id"];
        $strid = strval($id);
        $sql = "SELECT * FROM QUESTION where idQ = $id";
        $result = $db->query($sql);
        $question = $result->fetchAll();
        $listeQuestions = [];
        foreach ($question as $q) {
            $idQ = $q["idQ"];
            $nom = $q["nom"];
            $idType = $q["idType"];
            $sql2 = "SELECT nomType FROM TYPEQUESTION where idType = $idType";
            $result2 = $db->query($sql2);
            $type = $result2->fetchAll();
            $type = $type[0]["nomType"];
            $text = $q["textQuestion"];
            $choix = $q["choix"];
            $reponse = $q["reponse"];
            $score = $q["score"];
            $new_q = array(
                "idQ" => $idQ,
                "nom" => $nom,
                "type" => $type,
                "text" => $text,
                "choix" => $choix,
                "reponse" => $reponse,
                "score" => $score
            );
            array_push($listeQuestions, $new_q);
            // echo "<li><h1>$nom</h1><p>$text</p><p>$choix</p><p>$reponse</p><p>$score</p></li>";
        }
        $listeQuestions = array_reverse($listeQuestions);
        $question_total = 0;
        $question_correct = 0;
        $score_total = 0;
        $score_correct = 0;

        function questionText($q)
        {
            echo $q["text"] . "<br><input type'text' name='$q[nom]'>";
        }

        function reponseText($q, $v)
        {
            global $question_correct, $score_total, $score_correct;
            $score_total += $q["score"];
            if (is_null($v)) {
                return;
            }
            if ($q["reponse"] == $v) {
                $question_correct += 1;
                $score_correct += $q["score"];
            }
        }

        function questionRadio($q)
        {
            $html = $q["text"] . "<br>";
            $nom = $q["nom"];
            $i = 0;
            $choice = explode(", ", $q["choix"]);
            foreach ($choice as $c) {
                $i += 1;
                $value = $i;
                $ctext = $c;
                $html .= "<input type='radio' name='$nom' value='$value'>";
                $html .= "<label for='$nom'>$ctext</label>";
            }
            echo $html;
        }

        function reponseRadio($q, $v)
        {
            global $question_correct, $score_total, $score_correct;
            $score_total += $q["score"];
            if (is_null($v)) {
                return;
            }
            if ($q["reponse"] == $v) {
                $question_correct += 1;
                $score_correct += $q["score"];
            }
        }

        $questionHandler = array(
            "text" => "questionText",
            "radio" => "questionRadio"
        );

        $reponseHandler = array(
            "text" => "reponseText",
            "radio" => "reponseRadio"
        );

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            echo "<form method='POST' action='questions.php?id='".$_GET['id']."'><ol>";
            foreach ($listeQuestions as $q) {
                echo "<li><h1>$q[nom]</h1>";
                $questionHandler[$q["type"]]($q);
            }
            echo "</ol><input type='submit' value='Envoyer'></form>";
        } else {
            $question_total = 0;
            $question_correct = 0;
            $score_total = 0;
            $score_correct = 0;
            foreach ($listeQuestions as $q) {
                $question_total += 1;
                $reponseHandler[$q["type"]]($q, $_POST[$q["nom"]] ?? NULL);
            }
            echo "Reponses correctes : " . $question_correct . "/" . $question_total . "<br>";
            echo "Votre score : " . $score_correct . "/" . $score_total . "<br>";
        }
        ?>
    </ul>
    <?php
    echo "<button><a href='creer_question.php?idQ=$id'>Créer une question</a></button>"
    ?>
</body>