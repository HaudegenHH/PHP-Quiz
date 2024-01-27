<?php include 'database.php' ?>

<?php
    session_start();

    // check if the score is set in the session
    if (!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }

    // get the question number, query choices table and get the row with the correct answer
    $number = $_POST['question_number'];
    $result = $mysqli->query("SELECT * FROM `choices` WHERE question_number = $number AND is_correct = 1") or die($mysqli->error.__LINE__);
    $choice = $result->fetch_assoc();

    // grab the selected answer from the post superglobal array
    $choice_selected = $_POST['choice'];

    // check if the user selected the correct answer and if so increase the score
    if ($choice['id'] == $choice_selected) {
        $_SESSION['score']++;
    }

    // get the total number of questions
    $result = $mysqli->query("SELECT * FROM `questions`") or die($mysqli->error.__LINE__);
    $total = $result->num_rows;

    // increase the question number and redirect to the next question
    if ($number < $total) {
        $number = $number + 1;
        header("location: question.php?n=$number");
    } else {
        header("location: final_page.php");
    }
