<?php
/**
 * Created by PhpStorm.
 * User: Mahieu Burnat
 * Date: 01/09/2020
 */
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Home Page</title>
        <Link href="src/styles/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="banner">
            <div class="logo">
                <img src="src/img/logo.png" width="50" height="60">
            </div>
            <div class="title">
                <h1> Exercice </h1>
                <h2> Looper CM </h2>
            </div>
        </div>

        <div class="button">
            <a id="buttonTake" href="/index.php?Page=TakeExercise">TAKE AN EXERCISE</a>
            <a id="buttonCreate" href="/index.php?Page=NewExercise">CREATE AN EXERCISE</a>
            <a id="buttonManage" href="/index.php?Page=ManageExercise">MANAGE AN EXERCISE</a>
        </div>
    </body>
</html>

