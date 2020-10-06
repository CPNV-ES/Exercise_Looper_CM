<?php
/**
 * Created by PhpStorm.
 * User: Cyril Goldenschue
 * Date: 03/09/2020
 */

if(isset($_GET['Page']) || isset($_POST['idExercise'])){
    $Title = $ExerciseTitle->fetch();
}

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
                <span class="BannerTitle">Exercise : <span style="font-weight: bold;"><?= isset($_POST['Title']) ? $_POST['Title'] : $Title[0] ?></span></span>
            </section>
        </header>

<?php
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

    if(isset($_POST['Title'])) {
        $Exercise = GetOneExercise($_POST['Title']);
        $id = $Exercise->fetch();
    }elseif(isset($_POST['idExercise'])){
        $Exercise = GetOneExercise($Title[0]);
        $id = $Exercise->fetch();
    }

    if(isset($_GET['Page'])){


    //Manage Fields
    ?>
        <div class="row">
            <div class="column"><h1>Fields</h1>
                <table class="records">
                    <tr>
                        <th>Label</th>
                        <th>Value kind</th>
                        <th></th>
                    </tr>
                    <tbody class="table">
                    <?php while($AllField=$ExerciseFields->fetch()){ ?>
                        <tr>
                            <td class="td-line"><?= $AllField["Label"] ?></td>
                            <td class="td-line"><?= $AllField["ValueKind"] ?></td>
                            <td>
                                <a title="Edit" href="?Page=EditField&idField=<?= $AllField["id"] ?>&idExercise=<?= $AllField["Exercises_id"] ?>"><i class="fa fa-edit"></i></a>
                                <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="?Page=DelField&idField=<?= $AllField["id"] ?>&idExercise=<?= $AllField["Exercises_id"] ?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                <?php if(isset($_GET['id'])){ ?>
                <a data-confirm="Are you sure? You won't be able to further edit this exercise" class="button buttonNewFields" rel="nofollow" data-method="put" href="index.php?Page=CompleteExercise&Id=<?= isset($id[0]) ? $id[0] : $_GET['id'] ?>">
                    <i class="">Complete and be ready for answers</i>
                </a>
                <?php }elseif (isset($_GET['idExercise'])){ ?>
                <a data-confirm="Are you sure? You won't be able to further edit this exercise" class="button buttonNewFields" rel="nofollow" data-method="put" href="index.php?Page=CompleteExercise&Id=<?= isset($_GET['id']) ? $_GET['id'] : $_GET['idExercise'] ?>">
                    <i class="">Complete and be ready for answers</i>
                </a>
            <?php } ?>
            </div>

            <div class="column"><h1>New Field</h1>
                <form action="index.php" method="post">
                    <input type="hidden" name="Page" value="AddQuestion">
                    <input type="hidden" name="IdExercise" value="<?= isset($_GET['id']) ? $_GET['id'] : $_GET['idExercise'] ?>">
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
                    <div class="actions button">
                        <input type="submit" name="commit" value="Update Exercise">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

    <?php
}else{
    //New Fields
    ?>
        <div class="row">
            <div class="column">
                <h1>Fields</h1>
                <table class="records">
                    <tr>
                        <th>Label</th>
                        <th>Value kind</th>
                        <th></th>
                    </tr>
                    <tbody class="table">
                    <?php while($AllField=$ExerciseFields->fetch()){ ?>
                        <tr>
                            <td class="td-line"><?= $AllField["Label"] ?></td>
                            <td class="td-line"><?= $AllField["ValueKind"] ?></td>
                            <td>
                                <a title="Edit" href="?Page=EditField&idField=<?= $AllField["id"] ?>&idExercise=<?= $AllField["Exercises_id"] ?>"><i class="fa fa-edit"></i></a>
                                <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="?Page=DelField&idField=<?= $AllField["id"] ?>&idExercise=<?= $AllField["Exercises_id"] ?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <a data-confirm="Are you sure? You won't be able to further edit this exercise" class="button buttonNewFields" rel="nofollow" data-method="put" href="index.php?Page=CompleteExercise&Id=<?= isset($id[0]) ? $id[0] : $_GET['id'] ?>">
                    <i class="">Complete and be ready for answers</i>
                </a>
            </div>

            <div class="column">
                <h1>New Field</h1>
                <form action="index.php" method="post">
                    <input type="hidden" name="Page" value="AddQuestion">
                    <input type="hidden" name="IdExercise" value="<?= isset($_POST['IdExercise']) ? $_POST['IdExercise'] : $id[0] ?>">
                    <input type="hidden" name="ValueKind" value="<?= $ValueKind ?>">
                    <input type="hidden" name="Fields" value="<?= $Fields ?>">
                    <input type="hidden" name="Title" value="<?= isset($_POST['Title']) ? $_POST['Title'] : $Title[0] ?>">
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
                    <div class="actions button">
                        <input type="submit" name="commit" value="Create Exercise" data-disable-with="Create Exercise">
                    </div>
                </form>
            </div>
        </div>




    </body>
</html>
<?php } ?>