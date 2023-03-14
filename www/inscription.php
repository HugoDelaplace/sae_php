<?php require_once "base.php";?>

<body class="quizz">
    <h1>S'inscrire</h1>
    <div class="connecter">
        <form action="inscription.php" method="post">
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" required>
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp" required>
            <label for="mdpC">Confirmez le mot de passe :</label>
            <input type="password" name="mdpC" id="mdpC" required>
            <input type="submit" value="S'inscrire">
        </form>
    </div>
</body>

<?php require "connexion.php";
    if($_POST){
        $db = connectBd();
        if (isset($_POST["pseudo"]) && isset($_POST["mdp"]) && isset($_POST["mdpC"])) {
            $pseudo = $_POST["pseudo"];
            $mdp = $_POST["mdp"];
            $mdpC = $_POST["mdpC"];
            if ($mdp == $mdpC) {
                $sql = "INSERT INTO USER (pseudo, mdp) VALUES ('$pseudo', '$mdp')";
                $result = $db->query($sql);
                header("Location: connexion_user.php");
            }
            else {
                echo "Erreur";
                header("Location: inscription.php");
            }
        }
        else {
            echo "Erreur";
            header("Location: inscription.php");
        }
    }
?>