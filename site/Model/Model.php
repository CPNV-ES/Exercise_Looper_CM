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
 * @Description
 * @return PDOStatement
 */
function GetExerciseByState($State){

    $connect = getBD();

    $req = "SELECT exercises.id, Title FROM exercises WHERE State = '".$State."'";

    $result = $connect->query($req);

    return $result;

}

/**
 * @Description
 * @return PDOStatement
 */
function GetExerciseById($id){

    $connect = getBD();

    $req = "SELECT Title FROM exercises WHERE id = ".$id;

    $result = $connect->query($req);

    return $result;
}

/**
 * @Description
 * @return PDOStatement
 */
function GetFieldsByExercise($id){

    $connect = getBD();

    $req = "SELECT id, Label, ValueKind, Exercises_id FROM fields WHERE Exercises_id = ".$id;

    $result = $connect->query($req);

    return $result;
}

/**
 * @Description
 * @return PDOStatement
 */
function GetFieldsById($id){

    $connect = getBD();

    $req = "SELECT id, Label, ValueKind, Exercises_id FROM fields WHERE id = ".$id;

    $result = $connect->query($req);

    return $result;
}

/**
 * @Description
 * @return PDOStatement
 */
function GetOneExercise($Title){

    $connect = getBD();

    $req = "SELECT id FROM exercises WHERE Title = '".$Title."'";

    $result = $connect->query($req);

    return $result;
}

/**
 * @Description
 * @return PDOStatement
 */
function GetAnswers($id){

    $connect = getBD();

    $req = "SELECT answers.Exercises_id, Response, Label, Fields_id as id FROM `answers` INNER JOIN `fields` ON answers.Fields_id = `fields`.id WHERE TimeStamp_id = $id";

    $result = $connect->query($req);

    return $result;
}

/**
 * @Description
 * @return PDOStatement
 */
function GetAnswersByField($id){

    $connect = getBD();

    $req = "SELECT `TimeStamp`, answers.Exercises_id, Response, Fields_id as id FROM `answers`INNER JOIN `fields` ON answers.Fields_id = `fields`.id INNER JOIN `timestamp` ON answers.TimeStamp_id = `timestamp`.id WHERE Fields_id = $id";

    $result = $connect->query($req);

    return $result;
}


/**
 * @Description
 * @return PDOStatement
 */
function GetAllAnswer($id){
    // connexion à la BD exercicelooper
    $connection = getBD();

    // Création de la string pour la requête
    $req = "SELECT `TimeStamp`, ValueKind, Label, Response, Fields_id, answers.id FROM answers INNER JOIN `fields` ON answers.Fields_id = `fields`.id INNER JOIN `timestamp` ON answers.TimeStamp_id = `timestamp`.id WHERE answers.Exercises_id = $id";
    // Exécution de la requete

    $result = $connection->query($req);

    return $result;
}





/**
 * @Description
 * @return PDOStatement
 */
function CreateExercise($Title){
    // connexion à la BD exercicelooper
    $connect = getBD();

    // Création de la string pour la requête
    $req = "INSERT INTO exercises (Title) VALUES ('$Title')";
    // Exécution de la requete

    $connect->exec($req);
}

/**
 * @Description
 * @return PDOStatement
 */
function CreateFields($Id, $Title, $Value){
    // connexion à la BD exercicelooper
    $connect = getBD();

    // Création de la string pour la requête
    $req = "INSERT INTO fields (Label, ValueKind, Exercises_id) VALUES ('$Title', '$Value', ".$Id.")";
    // Exécution de la requete

    $connect->exec($req);
}

/**
 * @Description
 * @return PDOStatement
 */
function CreateAnswer($Response, $IdExercise, $IdTimeStamp, $IdField){
    // connexion à la BD exercicelooper
    $connect = getBD();

    // Création de la string pour la requête
    $req = "INSERT INTO answers (Response, Exercises_id, TimeStamp_id, Fields_id) VALUES ('$Response', $IdExercise, $IdTimeStamp, $IdField)";
    // Exécution de la requete

    $connect->exec($req);
}

/**
 * @Description
 * @return PDOStatement
 */
function CreateTimeStamp($Id){
    // connexion à la BD exercicelooper
    $connect = getBD();
    $date = date('Y-m-d H:i:s');
    // Création de la string pour la requête
    $req = "INSERT INTO `timestamp` (Exercises_id, `TimeStamp` ) VALUES ($Id, '$date')";
    // Exécution de la requete

    $connect->exec($req);

    $req = "SELECT id from `timestamp` WHERE `TimeStamp` = (SELECT MAX(`TimeStamp`) FROM `timestamp`)";

    $result = $connect->query($req);

    return $result->fetch()['id'];

}






/**
 * @Description
 * @return PDOStatement
 */
function UpdateStateExercise($id, $state){
    // connexion à la BD exercicelooper
    $connection = getBD();

    // Création de la string pour la requête
    $req = "UPDATE exercises SET State = '$state' WHERE id = ".$id;
    // Exécution de la requete

    $connection->exec($req);
}

/**
 * @Description
 * @return PDOStatement
 */
function UpdateOneField($id){
    // connexion à la BD exercicelooper
    $connection = getBD();

    // Création de la string pour la requête
    $req = "UPDATE fields SET Label = '".$_POST['FieldTitle']."', ValueKind = '".$_POST['FieldValue']."' WHERE id = ".$id;
    // Exécution de la requete

    $connection->exec($req);
}


/**
 * @Description
 * @return PDOStatement
 */
function UpdateAnswers($id, $idField, $answer){
    // connexion à la BD exercicelooper
    $connection = getBD();

    // Création de la string pour la requête
    $req = "UPDATE answers SET Response = '$answer' WHERE TimeStamp_id = $id AND Fields_id = $idField";
    // Exécution de la requete

    $connection->exec($req);
}








/**
 * @Description
 * @return PDOStatement
 */
function DeleteExercise($id){
    $connection = getBD();

    $req = "DELETE FROM fields WHERE Exercises_id = $id";

    $connection->exec($req);

    $req = "DELETE FROM exercises WHERE id = $id";

    $connection->exec($req);
}

/**
 * @Description
 * @return PDOStatement
 */
function DeleteField($id){
    // connexion à la BD exercicelooper
    $connection = getBD();

    // Création de la string pour la requête
    $req = "DELETE FROM fields WHERE id = $id";
    // Exécution de la requete

    $connection->exec($req);
}






