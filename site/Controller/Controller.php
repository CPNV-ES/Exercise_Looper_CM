<?php
/**
 * Created by PhpStorm.
 * User: Cyril.GOLDENSCHUE
 * Date: 01/09/2020
 */

?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Exercice Looper</title>
        <script src="https://kit.fontawesome.com/bf0671b196.js" crossorigin="anonymous"></script>
        <Link href="../Assets/css/StyleGlobal.css" rel="stylesheet" type="text/css">
    </head>
<?php

require "Model/Model.php";


/**
 * @Description Permet d'accéder à l'accueil
 */

function homePage(){
    require 'View/View_Reception.php';
}

/**
 * @Description
 */
function NewExercise(){
    require 'View/View_NewExercise.php';
}

/**
 * @Description
 */
function manageExercise(){

    $ExerciseBuilding = GetExerciseByState("Building");
    $ExerciseAnswering = GetExerciseByState("Answering");
    $ExerciseClosed = GetExerciseByState("Closed");

    require 'View/View_ManageExercise.php';
}



/**
 * @Description
 */
function NewFields(){
    CreateExercise($_POST['Title']);
    $idExercise = GetOneExercise($_POST['Title'])->fetch();
    $ExerciseFields = GetFieldsByExercise($idExercise[0]);
    $OneFieldExist = GetFieldsByExercise($idExercise["id"]);
    require 'View/View_NewFields.php';
}

/**
 * @Description
 */
function EditFields(){
    $ExerciseTitle = GetExerciseById($_GET['id']);
    $ExerciseFields = GetFieldsByExercise($_GET['id']);
    $OneFieldExist = GetFieldsByExercise($_GET['id']);
    require 'View/View_NewFields.php';
}

/**
 * @Description
 */
function EditOneField(){
    $ExerciseField = GetFieldsById($_GET['idField']);
    require 'View/View_EditField.php';
}

/**
 * @Description
 */
function UpdateField(){
    $ExerciseTitle = GetExerciseById($_POST['idExercise']);
    UpdateOneField($_POST['idField']);
    $ExerciseFields = GetFieldsByExercise($_POST['idExercise']);
    $OneFieldExist = GetFieldsByExercise($_POST['idExercise']);
    require 'View/View_NewFields.php';
}

/**
 * @Description
 */
function NewQuestion(){
    CreateFields($_POST['IdExercise'], $_POST['ExerciseTitle'], $_POST['FieldValue']);
    $idExercise = GetOneExercise($_POST['Title'])->fetch();
    $ExerciseFields = GetFieldsByExercise($idExercise["id"]);
    $OneFieldExist = GetFieldsByExercise($idExercise["id"]);
    require 'View/View_NewFields.php';
}

/**
 * @Description
 */
function CompleteExercise(){
    UpdateStateExercise($_GET['id'], "Answering");
    manageExercise();
}

/**
 * @Description
 */
function ClosedExercise(){
    UpdateStateExercise($_GET['id'], "Closed");
    manageExercise();
}

/**
 * @Description
 */
function DelExercise(){
    DeleteExercise($_GET['id']);
    manageExercise();
}

/**
 * @Description
 */
function DelField(){
    $ExerciseTitle = GetExerciseById($_GET['idExercise']);
    DeleteField($_GET['idField']);
    $ExerciseFields = GetFieldsByExercise($_GET['idExercise']);
    $OneFieldExist = GetFieldsByExercise($_GET['idExercise']);
    require 'View/View_NewFields.php';
}



/**
 * @Description
 */
function takeExercise(){

    $ExerciseAnswering = GetExerciseByState("Answering");
    require 'View/View_TakeExercise.php';
}


/**
 * @Description
 */
function AnsweringPage(){

    $ExerciseFields = GetFieldsByExercise($_POST['Id']);
    $ExerciseTitle = GetExerciseById($_POST['Id']);
    require 'View/View_Answer.php';
}

/**
 * @Description
 */
function SaveAnswer(){

    $TimeStamp = CreateTimeStamp($_POST['Id']);

    foreach($_POST as $name_post => $answer) {

        $result = explode(":", $name_post);
        if ($result[0] == "Answer") {
            CreateAnswer($answer, $_POST['Id'], $TimeStamp, $result[1]);
        }
    }

    $IdAnswers = $TimeStamp;
    $ExerciseFields = GetFieldsByExercise($_POST['Id']);
    $ExerciseTitle = GetExerciseById($_POST['Id']);
    require 'View/View_Answer.php';
}

/**
 * @Description
 */
function ProgressAnswer(){

    foreach($_POST as $name_post => $answer) {

        $result = explode(":", $name_post);
        if ($result[0] == "Answer") {
            UpdateAnswers($_GET['id'], $result[1], $answer);
        }
    }
    $idExercise = GetAnswers($_GET['id'])->fetch()['Exercises_id'];
    $IdAnswers = $_GET['id'];
    $AnswerInfos = GetAnswers($_GET['id']);
    $ExerciseFields = GetFieldsByExercise($idExercise);
    $ExerciseTitle = GetExerciseById($idExercise);
    require 'View/View_Answer.php';
}







/**
 * @Description
 */
function ResultAnswer(){
    $ExerciseFields = GetFieldsByExercise($_GET['id']);
    $Answer = GetAllAnswer($_GET['id']);
    require 'View/View_Result.php';
}




/**
 * @Description Display erros if the webpaage searched doesn't exists
 */
function error(){
    //affichage de la page d'erreur
    require 'View/View_Error.php';
}