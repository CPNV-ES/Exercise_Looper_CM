<?php
/**
 * Created by PhpStorm.
 * User: Cyril Goldenschue
 * Date: 03/09/2020
 */
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>New Exercise</title>
        <Link href="../Assets/styles/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    </head>

    <body><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <header class="heading creating">
            <section class="container">
                <a href="../index.php?Page=Home">
                    <img class="miniLogo" src="../Assets/img/logo.png">
                </a>
                <span class="BannerTitle">Exercise : <span style="font-weight: bold;"><?= $_POST['Title'] ?></span></span>
            </section>
        </header>


        <main class="container">
            <div class="row">
                <div class="column"><h1>Fields</h1></div>
                <table class="records">
                    <thead>
                    <tr>
                        <th>Label</th>
                        <th>Value kind</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>dav</td>
                        <td>single_line</td>
                        <td>
                            <a title="Edit" href="/exercises/206/fields/317/edit"><i class="fa fa-edit"></i></a>
                            <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="/exercises/206/fields/317"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    </tbody>
                    <a data-confirm="Are you sure? You won't be able to further edit this exercise" class="button" rel="nofollow" data-method="put" href="/exercises/206?exercise%5Bstatus%5D=answering"><i class="fa fa-comment"></i> Complete and be ready for answers</a>
                </table>




                <div class="column"><h1>New Field</h1></div>
                <form action="index.php" method="get">
                    <input type="hidden" name="Page" value="Fields">
                    <div class="field">
                        <label for="exercise_title">Label</label>
                        <input type="text" name="exercise[title]" id="exercise_title">
                    </div>
                    <div class="field">
                        <label for="exercise_title">Value kind</label>
                        <select name="field[value_kind]" id="field_value_kind"><option selected="selected" value="single_line">Single line text</option>
                            <option value="single_line_list">List of single lines</option>
                            <option value="multi_line">Multi-line text</option></select>
                    </div>
                    <div class="actions">
                        <input type="submit" name="commit" value="Create Exercise" data-disable-with="Create Exercise">
                    </div>
                </form>
            </div>


        </main>

        <div class="buttons">

        </div>
    </body>
</html>