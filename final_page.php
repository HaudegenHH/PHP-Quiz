<?php
    session_start();

    $score = $_SESSION['score'];

    // reset the score for a potential retry
    $_SESSION['score'] = 0;
?>

<?php include 'header.php' ?>

    <main>
        <div class="container">
            <h2>Done!</h2>
            <p>Final Score: <?= $score?></p>
            <a href="question.php?n=1" class="btn">Start again</a>
        </div>
    </main>

<?php include 'footer.php' ?>
