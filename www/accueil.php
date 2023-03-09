<?php require_once "base.html";?>

<body>
    <h1>PokéQuizz</h1>
    <div class="descri">
        <p>Le quizz Pokémon le plus complet du web !</p>
        <p>Testez vos connaissances sur les Pokémon et les jeux Pokémon !</p>
    </div>
</body>

<?php
session_start();
if(isset($_SESSION["login"]) || $_SESSION["login"] == true){
    echo $_SESSION["pseudo"];
}
?>