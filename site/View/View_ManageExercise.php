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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    </head>

    <body>
        <header class="heading dashbord">
            <section class="container">
                <a href="../index.php?Page=Accueil">
                    <img  class="miniLogo" src="../Assets/img/logo.png">
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
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </main>
    </body>
</html>