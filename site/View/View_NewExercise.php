<?php
/**
 * Created by PhpStorm.
 * User: Cyril Goldenschue
 * Date: 01/09/2020
 */
?>

<html>
    <body>
        <header class="heading creating">
            <section class="container">
                <a href="../index.php">
                    <img class="miniLogo" src="../Assets/img/logo.png">
                </a>
                <span class="BannerTitle">New exercise</span>
            </section>
        </header>

        <main class="container-exercise">
            <h1>New Exercise</h1>
            <br>
            <form action="index.php" method="post">
                <input type="hidden" name="Page" value="Fields" >
                <div class="field">
                    <label for="exercise_title">Title</label>
                    <input type="text" name="Title" id="exercise_title" required>
                </div>
                <div class="button">
                    <input type="submit" name="commit" value="Create Exercise" data-disable-with="Create Exercise">
                </div>
            </form>
    </body>
</html>