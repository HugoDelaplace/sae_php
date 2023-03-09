<?php require_once "base.html";?>

<body class="quizz">
    <h1>Se connecter</h1>
    <div class="connecter">
        <form action="connexion_user.php" method="post">
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" required>
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp" required>
            <input type="submit" value="Se connecter">
        </form>
    </div>
</body>

<?php require "connexion.php";
    if ($_POST) {
        $db = connectBd();
        if (isset($_POST["pseudo"]) && isset($_POST["mdp"])) {
            $pseudo = $_POST["pseudo"];
            $mdp = $_POST["mdp"];
            $sql = "SELECT * FROM user WHERE pseudo = '$pseudo' AND mdp = '$mdp'";
            $result = $db->query($sql);
            $user = $result->fetch();
            if ($user) {
                session_start();
                $_SESSION["pseudo"] = $user["pseudo"];
                $_SESSION["id"] = $user["id"];
                header("Location: accueil.php");
            }
            else {
                echo "Erreur";
                header("Location: connexion_user.php");
            }
        }
        else {
            echo "Erreur";
            header("Location: connexion_user.php");
        }
    }
?>