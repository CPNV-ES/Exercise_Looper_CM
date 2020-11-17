<?php

/**
 * Created by PhpStorm.
 * User: Cyril Goldenschue
 * Date: 17/11/2020
 */

?>
<html>
    <body>
        <header class="heading dashbord">
            <section class="container">
                <a href="../index.php">
                    <img class="miniLogo" src="../Assets/img/logo.png">
                </a>
            </section>
        </header>

        <main class="container">
            <dl>
                <h1> <?= $TimeStamp ?></h1>
                <?php while ($Answer = $Answers->fetch()){     ?>
                    <dt><?= $Answer["Label"] ?></dt>
                    <dd><?= $Answer["Response"] ?></dd>
                <?php } ?>

            </dl>
        </main>
    </body>
</html>
