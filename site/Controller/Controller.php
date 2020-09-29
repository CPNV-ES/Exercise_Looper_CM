<?php
/**
 * Created by PhpStorm.
 * User: Cyril.GOLDENSCHUE
 * Date: 01/09/2020
 */

//appel du fichier model.php pour pouvoir avoir accès au fonction dans le fichier
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
    require 'View/View_NewFields.php';
}

/**
 * @Description
 */
function EditFields(){
    $ExerciseTitle = GetExerciseById($_GET['id']);
    $ExerciseFields = GetFieldsByExercise($_GET['id']);
    require 'View/View_EditFields.php';
}

/**
 * @Description
 */
function NewQuestion(){
    CreateFields($_POST['IdExercise'], $_POST['ExerciseTitle'], $_POST['FieldValue']);
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
 * @Description Permet d'afficher la page d'erreur quand la page de destination n'existe pas
 */
function error(){
    //affichage de la page d'erreur
    require 'View/View_Error.php';
}