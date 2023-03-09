<?php require_once "base.php";?>
<body class="quizz">
    <h1>Liste des quizz</h1>
    <ul>
    <?php require "connexion.php";
        $db = connectBd();
        $sql = "SELECT * FROM QUIZZ";
        $result = $db->query($sql);
        $quizz = $result->fetchAll();
        foreach ($quizz as $q) {
            $id = $q["idQ"];
            $titre = $q["titreQ"];
            echo "<li><a href='quizz.php?id=$id' class='li-quizz'>$titre</a></li>";
        }
    ?>
    </ul>
</body>
</html>