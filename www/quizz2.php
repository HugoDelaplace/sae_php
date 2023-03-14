<?php require_once "base.php";?>
<body class="quizz">
    <?php $id=$GET_["id"]; ?>
    <h1>Quizz n°<?php echo $id; ?> </h1>
    <?php require "connexion.php";
        $db = connectBd();
        $sql = "SELECT * FROM QUIZZ where id = <?php $id; ?>";
        $result = $db->query($sql);
        $quizz = $result->fetchAll();
        foreach ($quizz as $q) {
            echo "<a href='quizz.php?id=$q[id]'>$q[titre]</a><br>";
        }
    ?>