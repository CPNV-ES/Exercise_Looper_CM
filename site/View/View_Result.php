<?php



?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>New Exercise</title>
</head>

<body>
<header class="heading dashbord">
    <section class="container">
        <a href="../index.php">
            <img class="miniLogo" src="../Assets/img/logo.png">
        </a>
    </section>
</header>

<main class="container">

    <div class="table">
        <th>Take</th>
        <?php
        while ($Field = $ExerciseFields->fetch()){
        ?>
        <th><?= $Field["Label"] ?></th>
        <?php } ?>

        </table>




    </div>

</main>
</body>
