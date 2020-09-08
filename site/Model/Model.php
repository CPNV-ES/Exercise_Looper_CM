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
    $connection = new PDO('mysql:host=localhost; dbname=exercicelooper','ConnectDB', 'Adm1n123');
    // permet d'avoir plus de détails sur les erreurs retournées
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connection;
}

/**
 * @Description Accès à la table comptes
 * @return PDOStatement
 */
function CreateExercise($Title){
    // connexion à la BD StockElectro
    $connection = getBD();

    // Création de la string pour la requête
    //"INSERT INTO Comptes (NomCompte, PrenomCompte, MailCompte, PasswordCompte, FkRoles) VALUES ('$Nom', '$Prenom','$Email', '$Pswd', '$TypeCompte')";
    $req = "INSERT INTO exercises (Title) VALUES ('$Title')";
    // Exécution de la requete

    $connection->exec($req);






}



