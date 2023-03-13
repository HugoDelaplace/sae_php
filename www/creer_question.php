<?php require_once "base.html";?>
<body class="quizz">
    <h1>Créer un quizz</h1>
    <form action="question_cree.php?" method="get">
        <?php $id = $_GET["idQ"];
            echo "<input type='hidden' name='idQ' id='idQ' value='$id'>"
        ?>
        <?php $idQ = $GET_["idQ"]; ?>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required>
        <label for="idType">Type :</label>
        <select name="idType" id="idType" required>
        <?php require "connexion.php";
            $db = connectBd();
            $sql = "SELECT * FROM TYPEQUESTION";
            $result = $db->query($sql);
            $type = $result->fetchAll();
            foreach ($type as $t) {
                $idT = $t["idType"];
                $nom = $t["nomType"];
                echo "<option value='$idT'>$nom</option>";
            }
        ?>
        </select>
        <label for="textQuestion">Texte de la question :</label>
        <input type="text" name="textQuestion" required>
        <label for="choix">Choix :</label>
        <input type="text" name="choix" required>
        <label for="reponse">Réponse :</label>
        <input type="text" name="reponse" required>
        <label for="score">Score :</label>
        <input type="number" name="score" required>
        <button type="submit">Créer</button>
    </form>
</body>