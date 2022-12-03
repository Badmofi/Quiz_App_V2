<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quiz App Results</title>
        <link rel="stylesheet" href="A2.css">
    </head>
    <body>
        <?php
        $theQuiz = $_SESSION["theQuiz"];
        $quizQuestions = $theQuiz["questions"];
        $userAnswers = $_SESSION["userAnswers"];
        for ($i = 0; $i < count($quizQuestions); $i++){
            //if not all questions have been answered, forward control to error page
            if((intval($userAnswers["q" . $i])) === -1){
                header("location: errorPage.php");
                return;
            }
        }
        echo "<h1>Results</h1>";
        $questions = $theQuiz['questions'];
        $totalScore = 0;
        echo "<form>";
        for($i = 0; $i < count($questions); $i++){
            $q = $questions[$i];
            echo "<div class='question'>";
            echo "<h3>" . "Question " . ($i + 1) . "</h3>";
            echo "<h4>" . $q["questionText"] . "</h4>";
            $choices = $q["choices"];
            for ($j = 0; $j < count($choices); $j++){
                $choice = $choices[$j];
                echo "<p><input type='radio' value='" . $choice . "'name='question" . $i . "'> " . $choice . "</p>";
            }
            //display user's answer and whether or not it is correct
            if ($q["answer"] !== intval($userAnswers["q" . $i])){
                echo "<p class='incorrect'>" . "Your answer: " . $choices[intval($userAnswers["q" . $i])] . "(incorrect)</p>";
                echo "<p>" . "Correct answer: " . $choices[$q["answer"]] . "</p>";
            }
            else{
                echo "<p class='correct'>" . "Your answer: " . $choices[intval($userAnswers["q" . $i])] . "(correct!)</p>";
                //add one point to user's score for correct answer
                $totalScore ++;
            }
            echo "</div>";
        }
        echo "<h3 id='score'>Score: " . $totalScore . "/10</h3>";
        echo "</form>";
        ?>
    </body>
</html>
