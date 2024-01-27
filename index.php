<?php include 'database.php' ?>

<?php
    // get the total number of questions
    $result = $mysqli->query("SELECT * FROM `questions`") or die($mysqli->error.__LINE__);
    $total = $result->num_rows;

?>

<?php include 'header.php' ?>

    <main>
        <div class="container">
            <h2>Test your PHP skills</h2>
            <p>This is a multiple choice test</p>
            <ul id="start-page">
                <li><strong>Number of questions: </strong><?= $total ?></li>
                <li><strong>Estimated time: </strong><?= $total / 2 ?> minute(s)</li>
            </ul>
            <a href="question.php?n=1" class="btn">Start</a>
            <a href="admin.php" class="btn">Add a question</a>
        </div>
    </main>

<?php include 'footer.php' ?>
