<?php require_once "base.html";?>
<body class="quizz">
    <h1>Créer un quizz</h1>
    <form action="quizz_cree.php" method="get">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" required>
        <label for="description">Description :</label>
        <input type="text" name="description">
        <input type="submit" value="Créer">
    </form>
</body>