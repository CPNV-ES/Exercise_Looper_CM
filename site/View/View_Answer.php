<?php
/**
 * Created by PhpStorm.
 * User: Cyril Goldenschue
 * Date: 27/10/2020
 */

?>

<html>

    <body>
        <header class="heading take">
            <section class="container">
                <a href="../index.php">
                    <img class="miniLogo" src="../Assets/img/logo.png">
                </a>
                <span class="BannerTitle">Exercise: <b><?= $ExerciseTitle->fetch()['Title'] ?></b></span>
            </section>
        </header>

        <main class="container">
            <h1>Your take</h1>
            <a>If you'd like to come back later to finish, simply submit it with blanks</a>
            <div class="containerField">
                <form action="index.php" method="post">
                    <input type="hidden" name="Page" value="SaveAnswer">
            <?php while ($Field=$ExerciseFields->fetch()){ ?>

                        <a><?= $Field['Label'] ?></a>
                        <input type="text" name="Answer: <?= $Field['Label'] ?>">

            <?php } ?>

                <div class="button">
                    <input style="width: 100%" type="submit" name="commit" value="TAKE IT">
                </div>
                </form>
            </div>
        </main>
    </body>
</html>