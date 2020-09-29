<?php
/**
 * Created by PhpStorm.
 * User: Cyril Goldenschue
 * Date: 03/09/2020
 */


if(isset($_POST['ValueKind']) && isset($_POST['Fields'])){
    if($_POST['ValueKind'] != "" && $_POST['Fields'] != "") {
        $ValueKind = $_POST['ValueKind'] . "," . $_POST['FieldValue'];
        $Fields = $_POST['Fields'] . "," . $_POST['ExerciseTitle'];
    }else{

        $ValueKind = $_POST['FieldValue'];
        $Fields = $_POST['ExerciseTitle'];
    }
}else{
    $Fields ="";
    $ValueKind = "";
}
$FieldsArray = explode( ",", $Fields);
$ValueKindArray = explode(",", $ValueKind);
