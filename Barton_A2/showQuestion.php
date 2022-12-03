<?php
session_start();
if(isset($_POST['question'])){
    $_SESSION["userAnswers"]["q" . $_SESSION["currentQuestionNumber"]] = $_POST['question'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quiz App</title>
        <link rel="stylesheet" href="A2.css">
    </head>
    <body>
        <?php
        $theQuiz = $_SESSION["theQuiz"];
        $questions = $theQuiz["questions"];
        $userAnswers = $_SESSION["userAnswers"];
        //parameters for buttons
        $prev = "<button type='submit' value='prev' name='button'>Previous</button>";
        $next = "<button type='submit' value='next' name='button'>Next</button>";
        $done = "<button type='submit' value='done' name='button' disabled>Done</button>";
        if (!isset($_POST['button'])) {
            $_SESSION["currentQuestionNumber"] += 0;
        }
        else if ($_POST['button'] === 'next') {
            $_SESSION["currentQuestionNumber"] += 1;
        }
        else if ($_POST['button'] === 'prev') {
            $_SESSION["currentQuestionNumber"] -= 1;
        }
        else if ($_POST['button'] === 'done') {
            header("location: results.php");
        }
        //start form
        echo "<form action='showQuestion.php' method='POST'>";
        if ($_SESSION["currentQuestionNumber"] != 0) {
            $prev = "<button type='submit' value='prev' name='button'>Previous</button>";
        }
        if ($_SESSION["currentQuestionNumber"] == 0){
            $prev = "<button type='submit' value='prev' name='button' disabled>Previous</button>";
        }
        if ($_SESSION["currentQuestionNumber"] == (count($questions) - 1)) {
            $next = "<button type='submit' value='next' name='button' disabled>Next</button>";
            $done = "<button type='submit' value='done' name='button'>Done</button>";
        }
        $q = $questions[$_SESSION["currentQuestionNumber"]];
        echo "<div class='question'>";
        echo "<h1>" . "Question " . ($_SESSION["currentQuestionNumber"] + 1) . "</h1>";
        echo "<h3>" . $q["questionText"] . "</h3>";
        $choices = $q["choices"];
        for($a = 0; $a < count($choices); $a++){
            $choice = $choices[$a];
            if ($a == $userAnswers["q" . $_SESSION["currentQuestionNumber"]]){
                echo "<p><input type='radio' value='" . $a . "'name='question'" . "checked='checked'" . "'> " . $choice . "</p>";
            }
            else{
                echo "<p><input type='radio' value='" . $a . "'name='question'" . "'> " . $choice . "</p>";
            }
        }
        echo "</div>";
        echo $prev . $next . $done;
        echo "</form>";
        ?>
    </body>
</html>
