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
        <h1 class="h1-ResultContainer"> <?= $labelField ?></h1>

        <main class="ViewResultContainer">
            <div>
                <table class="table">
                    <tr>
                        <th>Take</th>
                        <th>Content</th>
                    </tr>
                    <?php while ($Answer = $Answers->fetch()){     ?>
                        <tr>
                            <td><a href="?Page=DetailsByAnswer&id=<?= $Answer['id'] ?>"><?= $Answer["TimeStamp"] ?></a></td>
                            <td><?= $Answer["Response"] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </main>
    </body>
</html>
