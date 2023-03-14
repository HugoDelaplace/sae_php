<?php require "connexion.php";
        $db = connectBd();
        $id = $_GET["id"];
        $nom = $_GET["nom"];
        $strid = strval($id);
        $sql = "DELETE FROM QUESTION where nom = '$nom' and idQ = '$id'";
        $result = $db->query($sql);
        $question = $result->fetchAll();
        header("Location: questions.php?id=$id");
        ?>