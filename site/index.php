<?php
/**
 * Created by PhpStorm.
 * User: Cyril.GOLDENSCHUE
 * Date: 01/09/2020
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "Controller/Controller.php";

try {
    if (isset($_GET['$Page'])) {
        $Page = $_GET['$Page'];
        // Sélection de l'action passée par l'URL
        switch ($Page) {
            case 'Home':
                //homePage();
                NewExercise();
                break;
            default :
                error();
                break;
        }
    }
    else{
        //homePage();
        NewExercise();
    }
}catch (Exception $e)
{
    error ();
}