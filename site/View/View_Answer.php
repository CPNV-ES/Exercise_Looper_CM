<?php
/**
 * Created by PhpStorm.
 * User: Cyril Goldenschue
 * Date: 27/10/2020
 */
// faire l'enregistrement en mettant toute les info dans une liste pour faire un while.
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
            <a><?= isset($IdAnswers) ? "Bookmark this page, it's yours. You'll be able to come back later to finish." : "If you'd like to come back later to finish, simply submit it with blanks" ?></a>
            <div class="containerField">
                <form action="index.php<?= isset($IdAnswers) ? "?Page=AnswerProgress&id=".$IdAnswers : "" ?>" method="post">
                    <input type="hidden" name="Page" value="<?= isset($IdAnswers) ? "AnswerProgress" : "SaveAnswer" ?>">
                    <?php if(isset($_POST['Id'])){ ?>
                        <input type="hidden" name="Id" value="<?= isset($_POST['Id']) ? $_POST['Id'] : $_GET['id'] ?>">
                    <?php }else{ ?>
                        <input type="hidden" name="id" value="<?= isset($_POST['id']) ? $_POST['id'] : $_GET['id'] ?>">
                    <?php } ?>
                    <?php if(isset($AnswerInfos)){

                        while ($Field=$AnswerInfos->fetch()){
                            $label = str_replace(" ", "_",$Field['Label']);
                            ?>

                            <a><?= $Field['Label'] ?></a>
                            <input type="text" name="Answer:<?=$Field['id']?>:<?=$label?>" value="<?= $Field['Response'] ?>" >


                            <?php
                            //break;
                        }
                    }else{
                        while ($Field=$ExerciseFields->fetch()){
                        $label = str_replace(" ", "_",$Field['Label']);
                        ?>

                        <a><?= $Field['Label'] ?></a>
                        <input type="text" name="Answer:<?=$Field['id']?>:<?=$label?>" <?php if(isset($_POST['Answer:'.$Field['id'].':'.$label])){ ?> value="<?=$_POST['Answer:'.$Field['id'].':'.$label] ?>" <?php } ?>>

                    <?php } } ?>

                <div class="button">
                    <input style="width: 100%" type="submit" name="commit" value="save">
                </div>
                </form>
            </div>
        </main>
    </body>
</html>