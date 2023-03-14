<?php require "connexion.php";
        $db = connectBd();
        $id = $_GET["idQ"];
        $nom = $_GET["nom"];
        $strid = strval($id);
        $sql = "DELETE FROM QUESTION where nom = $nom";
        $result = $db->query($sql);
        $question = $result->fetchAll();
        header("Location: questions.php?id=$id");
        ?>