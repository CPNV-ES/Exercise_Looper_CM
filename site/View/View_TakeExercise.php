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
                <span class="BannerTitle">Take an exercise</span>
            </section>
        </header>

        <main class="container">
        <?php while ($Exercise=$ExerciseAnswering->fetch()){ ?>
            <div class="containerExercise">

                <a><?= $Exercise['Title'] ?></a>
                <form action="index.php" method="post">
                    <input type="hidden" name="Page" value="Answering" >
                    <input type="hidden" name="Id" value="<?= $Exercise['id'] ?>" >
                    <div class="button">
                        <input style="width: 100%" type="submit" name="commit" value="TAKE IT">
                    </div>
                </form>
            </div>
        <?php } ?>
        </main>


    </body>
</html>