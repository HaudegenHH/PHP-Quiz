<?php include 'database.php' ?>

<?php

    // set message to an empty string and fill it later on if the insertion was successfull
    $message = "";

    // get the total number of questions
    $result = $mysqli->query("SELECT * FROM `questions`") or die($mysqli->error.__LINE__);
    $total = $result->num_rows;

    if (isset($_POST['submit'])) {
        $question_number = $_POST['question_number'];
        $question_text = $_POST['question_text'];
        
        // create a choices array
        $choices = [];

        // started the index intentionally not from 0 to make the insert easier
        $choices[1] = $_POST['choice1'];
        $choices[2] = $_POST['choice2'];
        $choices[3] = $_POST['choice3'];
        $choices[4] = $_POST['choice4'];
        $choices[5] = $_POST['choice5'];

        // insert question
        $inserted_question = $mysqli->query("INSERT INTO `questions` (`question_number`, `text`) 
                                            VALUES('$question_number', '$question_text')") or die($mysqli->error.__LINE__);

        // insert choices if the question was inserted successfully
        if ($inserted_question) {            

            foreach($choices as $index => $value) {
                if ($value != '') {
                    $is_correct = $index == $_POST['correct_choice'] ? 1 : 0;

                    $query = "INSERT INTO `choices` (`question_number`, `is_correct`, `text`) 
                                VALUES('$question_number', '$is_correct', '$value')";

                    $inserted_choice = $mysqli->query($query) or die($mysqli->error.__LINE__);

                    if ($inserted_choice) {
                        continue;
                    } else {
                        die('Error: ' . $mysqli->errno . ') ' . $mysqli->error);
                    }
                }
            }

            $message = "Question has been added";
        }
    }

?>

<?php include 'header.php' ?>

    <main>
        <div class="container">
            <?php if (!empty($message)): ?>
                <p id="message"><?= $message ?></p>
            <?php endif ?>

            <a href="index.php" class="btn">Back</a>
            
            <h2>Add a question</h2>

            <form action="admin.php" method="post">
                <p>
                    <label>Question Number:</label>
                    <input type="number" name="question_number" value="<?= $total + 1 ?>" />
                </p>

                <p>
                    <label>Question Text:</label>
                    <input type="text" name="question_text" />
                </p>
                <p>
                    <label>Choice #1:</label>
                    <input type="text" name="choice1" />
                </p>
                <p>
                    <label>Choice #2:</label>
                    <input type="text" name="choice2" />
                </p>
                <p>
                    <label>Choice #3:</label>
                    <input type="text" name="choice3" />
                </p>
                <p>
                    <label>Choice #4:</label>
                    <input type="text" name="choice4" />
                </p>
                <p>
                    <label>Choice #5:</label>
                    <input type="text" name="choice5" />
                </p>

                <p>
                    <label>Correct Choice Number:</label>
                    <input type="number" name="correct_choice" />
                </p>
                <input type="submit" name="submit" value="Submit" class="btn">
            </form>

        </div>
    </main>

<?php include 'footer.php' ?>
