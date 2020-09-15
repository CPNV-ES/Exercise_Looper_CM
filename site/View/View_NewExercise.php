<?php
/**
 * Created by PhpStorm.
 * User: Cyril Goldenschue
 * Date: 01/09/2020
 */
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>New Exercise</title>
        <Link href="../Assets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <header class="heading creating">
            <section class="container">
                <a href="../index.php?Page=Home">
                    <img class="miniLogo" src="../Assets/img/logo.png">
                </a>
                <span class="BannerTitle">New exercise</span>
            </section>
        </header>







        <main class="container">
            <h1>New Exercise</h1>
            <form action="index.php" method="post">
                <input type="hidden" name="Page" value="Fields">
                <div class="field">
                    <label for="exercise_title">Title</label>
                    <input type="text" name="Title" id="exercise_title">
                </div>
                <div class="button">
                    <input type="submit" name="commit" value="Create Exercise" data-disable-with="Create Exercise">
                </div>
            </form>
        </main>
    </body>
</html>