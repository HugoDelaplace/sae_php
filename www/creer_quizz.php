<?php require_once "base.html";?>
<body class="quizz">
    <h1>Créer un quizz</h1>
    <form action="quizz_cree.php" method="post">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" required>
        <label for="description">Description :</label>
        <input type="text" name="description" id="description">
        <label for="nb_questions">Nombre de questions :</label>
        <input type="number" name="nb_questions" id="nb_questions" min="1" max="100" required>
        <input type="submit" value="Créer">
    </form>
</body>