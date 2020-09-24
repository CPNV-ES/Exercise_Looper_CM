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
        $Page = "Home";
        if(isset($_GET['Page'])){
            $Page = $_GET['Page'];
        }elseif (isset($_POST['Page'])){
            $Page = $_POST['Page'];
        }
        // Sélection de l'action passée par l'URL
        switch ($Page) {
            case 'Accueil':
                homePage();
                break;
            case 'NewExercise':
                  NewExercise();
                  break;
            case 'Fields':
                NewFields();
                break;
            case 'AddQuestion':
                NewQuestion();
                break;
            case 'CompleteExercise':
                CompleteExercise();
              break;
            case 'TakeExercise':
                takeExercise();
                break;
            case 'ManageExercise':
                manageExercise();

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