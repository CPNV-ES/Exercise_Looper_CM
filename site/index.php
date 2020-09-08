<?php
/**
 * Created by PhpStorm.
 * User: Cyril.GOLDENSCHUE
 * Date: 01/09/2020
 * Time: 11:36
 */

//Display Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//$_GET['Page']

require "Controller/Controller.php";

try {
    if (isset($_GET['Page']))
    {
        $Page = $_GET['Page'];

        // Sélection de l'action passée par l'URL
        switch ($Page)
        {
            case 'Accueil':
                homePage();
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
    error ($e->getMessage());
}