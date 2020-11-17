<?php



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

    <div>
        <table class="table">
            <th>Take</th>
            <?php while ($Field = $ExerciseFields->fetch()){ ?>
            <th><a href="?Page=DetailsByField&id=<?= $Field['id'] ?>"><?= $Field["Label"] ?></a></th>
            <?php }  $oldTimestamp = "";
            while ($Answer = $AllAnswer->fetch()){  $Timestamp = $Answer["TimeStamp"]; if($Timestamp != $oldTimestamp){   ?>
                <tr>
                    <td><a href="?Page=DetailsByAnswer&id=<?= $Answer['id'] ?>"><?= $Answer["TimeStamp"] ?></a></td>
                    <td><?= $Answer["Response"] != "" ? $Answer['ValueKind'] == "Single_line_text" ? "<i class='fa fa-check short'></i>" : "<i class='fa fa-double filled'></i>" : "<i class='fa fa-times empty'></i>"  ?></td>
            <?php $oldTimestamp = $Timestamp; }
                else
                { ?>
                    <td><?= $Answer["Response"] != "" ? $Answer['ValueKind'] == "Single_line_text" ? "<i class='fa fa-check short'></i>" : "<i class='fa fa-double filled'></i>" : "<i class='fa fa-times empty'></i>"  ?></td>
                <?php } if($Timestamp != $oldTimestamp){
                $TimeStamp = $oldTimestamp;
            ?>
                </tr>
            <?php }} ?>

        </table>

    </div>

</main>
</body>
