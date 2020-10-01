<?php
/**
 * Created by PhpStorm.
 * User: Cyril.GOLDENSCHUE
 * Date: 01/09/2020
 */

?>

    <script src="https://kit.fontawesome.com/bf0671b196.js" crossorigin="anonymous"></script>
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
function NewFields(){
    CreateExercise($_POST['Title']);
    $idExercise = GetOneExercise($_POST['Title'])->fetch();
    $ExerciseFields = GetFieldsByExercise($idExercise[0]);
    require 'View/View_NewFields.php';
}

/**
 * @Description
 */
function EditFields(){
    $ExerciseTitle = GetExerciseById($_GET['id']);
    $ExerciseFields = GetFieldsByExercise($_GET['id']);
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
    require 'View/View_NewFields.php';
}

/**
 * @Description
 */
function NewQuestion(){
    CreateFields($_POST['IdExercise'], $_POST['ExerciseTitle'], $_POST['FieldValue']);
    $idExercise = GetOneExercise($_POST['Title'])->fetch();
    $ExerciseFields = GetFieldsByExercise($idExercise[0]);
    require 'View/View_NewFields.php';
}

/**
 * @Description
 */
function CompleteExercise(){
    UpdateStateExercise($_GET['Id']);
    homePage();
}

function takeExercise(){

    require 'View/View_TakeExercise.php';
}

function manageExercise(){

    $ExerciseAnswering = GetExerciseByState("Answering");
    $ExerciseBuilding = GetExerciseByState("Building");
    $ExerciseClosed = GetExerciseByState("Closed");

    require 'View/View_ManageExercise.php';

}

//It could be useful to use that 'cause we can manage a lot of line and time.
//Discussion in progress.
function openNewPage($url){
    require 'View/' . $url . '.php';
}
/**
 * @Description Display erros if the webpaage searched doesn't exists
 */
function error(){
    //affichage de la page d'erreur
    require 'View/View_Error.php';
}