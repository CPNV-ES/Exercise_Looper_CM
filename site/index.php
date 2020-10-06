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

    require "Controller/Controller.php";


    $request = '';
    $get_params_offset = stripos($_SERVER['REQUEST_URI'], '?');


    // Remove GET parameters from request uri
    if ($get_params_offset) {
        $request = substr($_SERVER['REQUEST_URI'], 0, $get_params_offset);
    } else {
        $request = $_SERVER['REQUEST_URI'];
    }

    switch ($request) {
        case '' :
        case '/' :
            require 'View/View_Reception.php'; //home directory
            break;
        case '/TakeExercise' :
            require 'View/View_TakeExercise.php';
            break;
        case '/NewExercise' :
            require 'View/View_NewExercise.php';
            break;
        case '/NewFields' :
            NewFields();
            break;
        case '/EditFields' :
            NewQuestion();
            EditFields();
            break;
        case '/UpdateField' :
            UpdateField();
            break;
        case '/NewQuestion' :
            NewQuestion();
            break;
        case '/CompleteExercise' :
            CompleteExercise();
            break;
        case '/takeExercise' :
            takeExercise();
            break;
        case '/manageExercise' :
            manageExercise();
            break;
        case '/ManageExercise' :
            require 'View/View_ManageExercise.php';
            break;
        default:
            http_response_code(404);
            require 'View/View_Error404.php'; //Aie, something wrong ! (page not found)
            break;
    }
?>
