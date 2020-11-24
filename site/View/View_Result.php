<?php

/**
 * Created by PhpStorm.
 * User: Cyril Goldenschue
 * Date: 10/11/2020
 */

?>
<html>
<body>
<header class="heading dashbord">
    <section class="container">
        <a href="../index.php">
            <img class="miniLogo" src="../Assets/img/logo.png">
        </a>
        <span class="BannerTitle">Exercise : <span style="font-weight: bold;"><?= $title ?></span></span>
    </section>
</header>

<main class="ViewResultContainer">
    <div>
        <table>
            <th>Take</th>
            <?php while ($Field = $ExerciseFields->fetch()){ ?>
            <th><a href="?Page=DetailsByField&id=<?= $Field['id'] ?>&title=<?= $title ?>"><?= $Field["Label"] ?></a></th>
            <?php }  $oldTimestamp = "";
            while ($Answer = $AllAnswer->fetch()){  $Timestamp = $Answer["TimeStamp"];
                $NumWord = str_word_count($Answer['Response'], 0);


                if($Timestamp != $oldTimestamp){
                    ?>
                <tr>
                    <td><a href="?Page=DetailsByAnswer&id=<?= $Answer['TimeStamp_id'] ?>&title=<?= $title ?>"><?= $Answer["TimeStamp"] ?></a></td>
                    <td><?= $Answer["Response"] != "" ? $NumWord == 1 ? "<i class='fa fa-check short'></i>" : "<i class='fas fa-check-double'></i>" : "<i class='fa fa-times empty red-cross'></i>"  ?></td>
            <?php $oldTimestamp = $Timestamp; }
                else
                { ?>
                    <td><?= $Answer["Response"] != "" ? $NumWord == 1 ? "<i class='fa fa-check short'></i>" : "<i class='fas fa-check-double'></i>" : "<i class='fa fa-times empty red-cross'></i>"  ?></td>
                <?php } if($Timestamp != $oldTimestamp){
                $TimeStamp = $oldTimestamp;
            ?>
                </tr>
            <?php }} ?>

        </table>

    </div>

</main>
</body>

