<?php
/**
 * Created by PhpStorm.
 * User: Cyril.GOLDENSCHUE
 * Date: 01/09/2020
 * Time: 11:36
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
 * @Description Permet d'afficher la page d'erreur quand la page de destination n'existe pas
 */
function error(){
    //affichage de la page d'erreur
    require 'View/View_Error.php';
}