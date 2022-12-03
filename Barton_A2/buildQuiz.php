<?php
//start session
session_start();
include 'FileUtils.php';
//get file name from POST parameter
$quizChoice = $_POST["quiz"];
if ($quizChoice == "WG") {
    $fileName = "WorldGeography.json";
}
else if ($quizChoice == "NS") {
    $fileName = "NumberSystems.json";
}
//read data from JSON file and store in SESSION
$fileContents = readFileIntoString($fileName);
$quiz = json_decode($fileContents, true);
$_SESSION["theQuiz"] = $quiz;
//store current question number in SESSION
$_SESSION["currentQuestionNumber"] = 0;
//create array for user answers
$questions = $quiz["questions"];
$userAnswers = array();
for ($i = 0; $i < count($questions); $i++){
    $userAnswers["q" . $i] = -1;
}
$_SESSION["userAnswers"] = $userAnswers;
//forward control to showQuestions.php
header("location: showQuestion.php");


