<?php
/**
 * Created by PhpStorm.
 * User: Cyril.GOLDENSCHUE
 * Date: 01/09/2020
 */

/**
 * @Description Connection to the database
 * @return PDO
 */
function getBD()
{
    // connexion au serveur MySQL et à la BD
    $connexion = new PDO('mysql:host=localhost; dbname=exercicelooper','ConnectDB', 'Adm1n123');
    // permet d'avoir plus de détails sur les erreurs retournées
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connexion;
}