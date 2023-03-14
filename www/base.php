<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
    <link rel="stylesheet" href="static/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="accueil.php"><button class="nava">Accueil</button></a>
            <a href="new_quizz.php"><button class="nava">Quiz</button></a>
            <a href="creer_quizz.php"><button class="nava">Créer un quiz</button></a>
        </nav>

        <div class="connecter">
            <a href="connexion_user.php"><button class="connex">Se connecter</button></a>
            <a href="inscription.php"><button class="connex">S'inscrire</button></a>
            <?php session_start();
            if (isset($_SESSION["login"]) || $_SESSION["login"] == true) {
                $util = $_SESSION["pseudo"];
                echo "<p class='util'>$util</p>";
            }
            ?>
    </header>
</body>
</html>