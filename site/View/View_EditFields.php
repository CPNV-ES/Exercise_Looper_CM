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

$Title = $ExerciseTitle->fetch();

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>New Exercise</title>
    <Link href="../Assets/css/styleNew.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/bf0671b196.js" crossorigin="anonymous"></script>
</head>

<body>

<header class="heading creating">
    <section>
        <a href="../index.php?Page=Accueil">
            <img class="miniLogo" src="../Assets/img/logo.png">
        </a>
        <span class="BannerTitle">Exercise : <span style="font-weight: bold;"><?= $Title[0] ?></span></span>
    </section>
</header>


<main class="container">
    <div class="row">
        <div class="column"><h1>Fields</h1></div>
        <table class="records">
            <tr>
                <th>Label</th>
                <th>Value kind</th>
                <th></th>
            </tr>
            <tbody class="table">
            <?php while($AllField=$ExerciseFields->fetch()){ ?>
                <tr>
                    <td><?= $AllField["Label"] ?></td>
                    <td><?= $AllField["ValueKind"] ?></td>
                    <td>
                        <a title="Edit" href="edit"><i class="fa fa-edit"></i></a>
                        <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="delete"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
            <a data-confirm="Are you sure? You won't be able to further edit this exercise" class="button" rel="nofollow" data-method="put" href="index.php?Page=SaveExercise&Id=<?= $_GET['id'] ?>"><i class="fa fa-comment"></i> Complete and be ready for answers</a>
        </table>

        <div class="column"><h1>New Field</h1></div>
        <form action="index.php" method="post">
            <input type="hidden" name="Page" value="AddQuestion">
            <input type="hidden" name="IdExercise" value="<?= $_GET['id'] ?>">
            <input type="hidden" name="ValueKind" value="<?= $ValueKind ?>">
            <input type="hidden" name="Fields" value="<?= $Fields ?>">
            <input type="hidden" name="Title" value="<?= $Title[0] ?>">
            <div class="field">
                <label for="exercise_title">Label</label>
                <input type="text" name="ExerciseTitle" id="exercise_title">
            </div>
            <div class="field">
                <label for="exercise_title">Value kind</label>
                <select name="FieldValue" id="field_value_kind">
                    <option selected="selected" value="Single_line_text">Single line text</option>
                    <option value="List_of_single_lines">List of single lines</option>
                    <option value="Multi-line_text">Multi-line text</option>
                </select>
            </div>
            <div class="actions">
                <input type="submit" name="commit" value="Create Exercise" data-disable-with="Create Exercise">
            </div>
        </form>
    </div>
</main>
</body>
</html>