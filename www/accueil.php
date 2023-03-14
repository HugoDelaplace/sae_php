<?php require_once "base.php";
if (empty($_SESSION['login'])) {
    header('Location: inscription.php');
    exit;
}
?>

<body class="quizz">
    <h1>PokéQuizz</h1>
    <div class="descri">
        <p>Le quizz Pokémon le plus complet du web !</p>
        <p>Testez vos connaissances sur les Pokémon et les jeux Pokémon !</p>
    </div>
</body>

