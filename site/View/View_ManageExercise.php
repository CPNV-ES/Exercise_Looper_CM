<?php

/**
 * Created by PhpStorm.
 * User: Cyril Goldenschue
 * Date: 29/09/2020
 */

/*

*/




?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>New Exercise</title>
        <Link href="../Assets/css/styleDash.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <header class="heading dashbord">
            <section class="container">
                <a href="../index.php">
                    <img class="miniLogo" src="../Assets/img/logo.png">
                </a>
            </section>
        </header>

        <main class="container">

            <div class="tableManage">
                <div class="column">
                    <h1>Building</h1>
                    <table class="table">
                        <tr><th>Title</th></tr>
                        <?php
                        while($Building=$ExerciseBuilding->fetch()){
                            //0 = id; 1 = Title
                            ?>
                            <tr>
                                <td><?= $Building["Title"] ?></td>
                                <td>
                                    <a title="Manage fields" href="?id=<?= $Building["id"] ?>&Page=FieldsEdit"><i class="fa fa-edit"></i></a>
                                    <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="?Page=DelExercise&id=<?= $Building["id"] ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="column">
                    <h1>Answering</h1>
                    <table class="table">
                        <tr><th>Title</th></tr>
                        <?php
                        while($Answering=$ExerciseAnswering->fetch()){
                            //0 = id; 1 = Title
                            ?>
                            <tr>
                                <td><?= $Answering["Title"] ?></td>
                                <td>
                                    <a title="Manage fields" href="/exercises/<?= $Answering["id"] ?>/fields"><i class="fa fa-edit"></i></a>
                                    <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="?Page=DelExercise&id=<?= $Answering["id"] ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="column">
                    <h1>Closed</h1>
                    <table class="table">
                        <tr><th>Title</th></tr>
                        <?php
                        while($Closed=$ExerciseClosed->fetch()){
                        //0 = id; 1 = Title
                        ?>
                        <tr>
                            <td><?= $Closed["Title"] ?></td>
                            <td>
                                <a title="Manage fields" href="/exercises/209/fields"><i class="fa fa-edit"></i></a>
                                <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="?Page=DelExercise&id=<?= $Closed["id"] ?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </main>
    </body>
</html>