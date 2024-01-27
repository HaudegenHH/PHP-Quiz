<?php include 'database.php' ?>

<?php
    // set the question number
    $number = (int) $_GET['n'];

    // query the question from the db with the current question number
    $result = $mysqli->query("SELECT * FROM `questions` WHERE question_number = $number") or die($mysqli->error.__LINE__);
    $question = $result->fetch_assoc();

    // query the choices
    $result = $mysqli->query("SELECT * FROM `choices` WHERE question_number = $number") or die($mysqli->error.__LINE__);
    $choices = $result->fetch_all(MYSQLI_ASSOC);

    // echo "<pre>";
    // print_r($choices);
    // echo "</pre>";

?>

<?php include 'header.php' ?>

    <main>
        <div class="container">
            <div class="current">Question 1 of 5</div>
            <p class="question">
                <?= $question['text'] ?>
            </p>
            <form action="process.php" method="post">
                <ul class="choices">
                    <?php foreach($choices as $choice): ?> 

                        <li><input type="radio" name="choice" value="<?= $choice['id'] ?>"><?= $choice['text']?></li>

                    <?php endforeach ?>
                </ul>
                <input type="hidden" name="question_number" value="<?= $number ?>">

                <input type="submit" value="Submit" class="btn">
            </form>
        </div>
    </main>

<?php include 'footer.php' ?>