<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quiz App</title>
        <link rel="stylesheet" href="A2.css">
    </head>
    <body>
        <h2>Quiz App</h2>
        <p>Select a quiz and press "Start" to begin</p>
        <form action="buildQuiz.php" method="POST">
            <select name="quiz">
                <option value="WG">World Geography</option>
                <option value="NS">Numbers Systems</option>
            </select>
            <button type="submit">Start</button>
        </form>
    </body>
</html>
