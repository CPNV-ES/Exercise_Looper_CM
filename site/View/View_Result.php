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
            <?php }
            while ($Answer = $AllAnswer->fetch()){ ?>
                <tr>
                    <td><a href="?Page=DetailsByAnswer&id=<?= $Answer['id'] ?>"><?= $Answer["TimeStamp"] ?></a></td>
                    <td><?= $Answer["ValueKind"] ?></td>
                </tr>
            <?php } ?>
        </table>




    </div>

</main>
</body>
