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

$Exercise = GetOneExercise($_POST['Title']);

$id = $Exercise->fetch();
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>New Exercise</title>
        <Link href="../Assets/css/styleNew.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <header class="heading creating">
            <section class="container">
                <a href="../index.php">
                    <img class="miniLogo" src="../Assets/img/logo.png">
                </a>
                <span class="BannerTitle">Exercise : <span style="font-weight: bold;"><?= $_POST['Title'] ?></span></span>
            </section>
        </header>
        <main class="container">
            <div class="row">
                <div class="column"><h1>Fields</h1></div>
                <table class="records">
                    <thead>
                        <tr>
                            <th>Label</th>
                            <th>Value kind</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table">
                    <?php for ($i = 0; $i < count($FieldsArray); $i++){ ?>
                    <tr>
                        <td><?= $FieldsArray[$i] ?></td>
                        <td><?= $ValueKindArray[$i] ?></td>
                        <td>
                            <a title="Edit" href="edit"><i class="fa fa-edit"></i></a>
                            <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <a data-confirm="Are you sure? You won't be able to further edit this exercise" class="button" rel="nofollow" data-method="put" href="index.php?Page=CompleteExercise&Id=<?= $id[0] ?>"><i class="fa fa-comment"></i> Complete and be ready for answers</a>
                </table>

                <div class="column"><h1>New Field</h1></div>
                <form action="index.php" method="post">
                    <input type="hidden" name="Page" value="AddQuestion">
                    <input type="hidden" name="IdExercise" value="<?= isset($_POST['IdExercise']) ? $_POST['IdExercise'] : $id[0] ?>">
                    <input type="hidden" name="ValueKind" value="<?= $ValueKind ?>">
                    <input type="hidden" name="Fields" value="<?= $Fields ?>">
                    <input type="hidden" name="Title" value="<?= $_POST['Title'] ?>">
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









        <h2>Two Equal Columns</h2>

        <div class="row">
            <div class="column" style="background-color:#aaa;">
                <h1>Fields</h1>
                <h3>Label</h3>
                <h3>Value Kind</h3>
                <a data-confirm="Are you sure? You won't be able to further edit this exercise" class="button" rel="nofollow" data-method="put" href="index.php?Page=CompleteExercise&Id=<?= $id[0] ?>">
                    <i class="fa fa-comment">Complete and be ready for answers</i>
                </a>
            </div>
            <div class="column" style="background-color:#bbb;">
                <h1>New Field</h1>
                <p>Some text..</p>
            </div>
        </div>





    </body>
</html>
