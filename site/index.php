<?php
/**
 * Created by PhpStorm.
 * User: Cyril.GOLDENSCHUE & Mathieu Burnat
 * Date: 01/09/2020
 */

//Display Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//$_GET['Page']

require "Controller/Controller.php";

try {
    if (isset($_GET['Page']) or isset($_POST['Page'])) {
        $Page = "Accueil";
        if(isset($_GET['Page'])){
            $Page = $_GET['Page'];
        }elseif (isset($_POST['Page'])){
            $Page = $_POST['Page'];
        }
        // Sélection de l'action passée par l'URL
        switch ($Page) {
            //reception
            case 'Accueil':
                homePage();
                break;
            case 'Answering':
                AnsweringPage();
                break;
            case 'SaveAnswer':
                SaveAnswer();
                break;
            case 'NewExercise':
                NewExercise();
                break;
            case 'Fields':
                NewFields();
                break;
            case 'FieldsEdit':
                EditFields();
                break;
            case 'EditField':
                EditOneField();
                break;
            case 'FieldsUpdate':
                UpdateField();
                break;
            case 'AddQuestion':
                NewQuestion();
                break;
            case 'CompleteExercise':
                CompleteExercise();
                break;
            case 'ClosedExercise':
                ClosedExercise();
                break;
            case 'ResultExercise':
                ResultAnswer();
                break;
            case 'TakeExercise':
                takeExercise();
                break;
            case 'ManageExercise':
                manageExercise();
                break;
            case 'DelExercise':
                DelExercise();
                break;
            case 'DelField':
                DelField();
                break;
            default :
                error();
                break;
        }
    }
    else {
        homePage();
    }
}catch (Exception $e)
{
    error ();
}