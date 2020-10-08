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
                    <table class="tableManage">
                        <tr><th>Title</th></tr>
                        <?php
                        while($Building=$ExerciseBuilding->fetch()){
                            $FieldBuilding = GetFieldsByExercise($Building['id']);
                            $ExerciseId = $FieldBuilding->fetch();
                            ?>
                            <tr>
                                <td><?= $Building["Title"] ?></td>
                                <td class="icon">
                                    <?php if($ExerciseId != false){ ?>
                                    <a title="Be ready for answers" rel="nofollow" data-method="put" href="?Page=CompleteExercise&id=<?= $Building["id"] ?>"><i class="fa fa-comment"></i></a>
                                    <?php } ?>
                                    <a title="Manage fields" href="?id=<?= $Building["id"] ?>&Page=FieldsEdit"><i class="fa fa-edit"></i></a>
                                    <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="?Page=DelExercise&id=<?= $Building["id"] ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="column">
                    <h1>Answering</h1>
                    <table class="tableManage">
                        <tr><th>Title</th></tr>
                        <?php
                        while($Answering=$ExerciseAnswering->fetch()){
                            //0 = id; 1 = Title
                            ?>
                            <tr>
                                <td><?= $Answering["Title"] ?></td>
                                <td class="icon">
                                    <a title="Show results" href="?Page=ResultExercise&id=<?= $Answering["id"] ?>"><i class="fa fa-chart-bar"></i></a>
                                    <a title="Close" rel="nofollow" data-method="put" href="?Page=ClosedExercise&id=<?= $Answering["id"] ?>"><i class="fa fa-minus-circle"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="column">
                    <h1>Closed</h1>
                    <table class="tableManage">
                        <tr><th>Title</th></tr>
                        <?php
                        while($Closed=$ExerciseClosed->fetch()){
                        //0 = id; 1 = Title
                        ?>
                        <tr>
                            <td><?= $Closed["Title"] ?></td>
                            <td class="icon">
                                <a title="Manage fields" href="?Page=ResultExercise&id=<?= $Closed["id"] ?>"><i class="fa fa-edit"></i></a>
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