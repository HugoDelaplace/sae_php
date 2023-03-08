<?php require_once "base.html";?>
<body class="quizz">
    <button><a href="creer_question.php">Créer une question</a></button>
    <form action="POST">
        <p> Qu'elle est la couleur du cheval blanc d'Henry IV ?</p>
        <input placeholder="votre réponse ici"></input>
        <p>9 + 10 = ?</p>
        <ul>
            <li><input type="checkbox">19</input></li>
            <li><input type="checkbox">21</input></li>
            <li><input type="checkbox">910</input></li>
            <li><input type="checkbox">2</input></li>
        </ul>
    </form>
</body>
</html>

<?php
$question = [
    array(
        "name" => "ultime",
        "type" => "text",
        "text" => "Quelle est la réponse à la question ultime de la vie?",
        "answer" => "42",
        "score" => 4.2
    ),
    array(
        "name" => "cheval",
        "type" => "radio",
        "text" => "Quelle est la couleur du cheval blanc d'Henry IV ?",
        "choice" => [
            array(
                "text" => "Bleu",
                "value" => "bleu"),
            array(
                "text" => "Blanc",
                "value" => "blanc"),
            array(
                "text" => "Rouge",
                "value" => "rouge")
            ],
        "answer" => "blanc",
        "score" => 2
    )
];

$question_total = 0;
$question_correct = 0;
$score_total = 0;
$score_correct = 0;

function questionText($q)
{
    echo $q["text"]."<br><input type'text' name='$q[name]'>";
}

function answerText($q, $v)
{
    global $question_correct, $score_total, $score_correct;
    $score_total += $q["score"];
    if (is_null($v)){
        return;
    }
    if ($q["answer"] == $v){
        $question_correct += 1;
        $score_correct += $q["score"];
    }
}

function questionRadio($q)
{
    $html = $q["text"]."<br>";
    $i = 0;
    foreach ($q["choice"] as $c){
        $i += 1;
        $html .= "<input type='radio' name='$q[name]' value='$c[value]' id='$q[name]-$i'>";
        $html .= "<label for='$q[name]-$i'>$c[text]</label>";
    }
    echo $html;
}

function answerRadio($q, $v)
{
    global $question_correct, $score_total, $score_correct;
    $score_total += $q["score"];
    if (is_null($v)){
        return;
    }
    if ($q["answer"] == $v){
        $question_correct += 1;
        $score_correct += $q["score"];
    }
}

$questionHandler = array(
    "text" => "questionText",
    "radio" => "questionRadio"
);

$answerHandler = array(
    "text" => "answerText",
    "radio" => "answerRadio"
);

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    echo "<form method='POST' action='quizz.php'><ol>";
    foreach ($question as $q){
        echo "<li>";
        $questionHandler[$q["type"]]($q);
    }
    echo "</ol><input type='submit' value='Envoyer'></form>";
}
else {
    $question_total = 0;
    $question_correct = 0;
    $score_total = 0;
    $score_correct = 0;
    foreach ($question as $q){
        $question_total += 1;
        $answerHandler[$q["type"]]($q, $_POST[$q["name"]] ?? NULL);
    }
    echo "Reponse correctes : " . $question_correct . "/" . $question_total . "<br>";
    echo "Votre score : " . $score_correct . "/" . $score_total . "<br>";
}
?>