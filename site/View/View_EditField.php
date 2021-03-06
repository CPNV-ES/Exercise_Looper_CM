<?php
/**
 * Created by PhpStorm.
 * User: Cyril Goldenschue
 * Date: 29/09/2020
 */

?>

<html>
    <body>
        <header class="heading creating">
            <section class="container">
                <a href="../index.php">
                    <img class="miniLogo" src="../Assets/img/logo.png">
                </a>
                <span class="BannerTitle">Exercise : <span style="font-weight: bold;">Field</span></span>
            </section>
        </header>
        <main class="container">
            <form action="index.php" method="post">
                <input type="hidden" name="Page" value="FieldsUpdate">
                <input type="hidden" name="idExercise" value="<?= $_GET['idExercise'] ?>">
                <input type="hidden" name="idField" value="<?= $_GET['idField'] ?>">
                <?php while($Infos=$ExerciseField->fetch()){ ?>
                <div class="field">
                    <label for="exercise_title">Label</label>
                    <input type="text" name="FieldTitle" value="<?= $Infos['Label'] ?>" required >
                </div>
                <div class="field">
                    <label for="exercise_title">Value kind</label>
                    <select name="FieldValue" id="field_value_kind" >
                        <option <?php if($Infos['ValueKind']=="Single_line_text"){ ?> selected="selected" <?php } ?> value="Single_line_text">Single line text</option>
                        <option <?php if($Infos['ValueKind']=="List_of_single_lines"){ ?> selected="selected" <?php } ?> value="List_of_single_lines">List of single lines</option>
                        <option <?php if($Infos['ValueKind']=="Multi-line_text"){ ?> selected="selected" <?php } ?> value="Multi-line_text">Multi-line text</option>
                    </select>
                </div>
                <?php } ?>
                <div class="actions button">
                    <input type="submit" name="commit" value="Update Exercise">
                </div>
            </form>
        </main>
    </body>
</html>