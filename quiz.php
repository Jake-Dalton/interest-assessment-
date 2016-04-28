<!DOCTYPE html>
<html>
    <head>
        <?php require 'connection.php';?>

        <?php
        $selectedQuizID = intval($_POST['quizSelect']);

        $sql = "SELECT quizName
                        FROM quizzes
                        WHERE quizID = " . $selectedQuizID;
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<title>" . $row[quizName] . " Assessment Quiz</title>";
            }
        } else {
            echo "No results found.";
        }

        ?>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- quiz css -->
        <link rel="stylesheet" type="text/css" href="css/customstyles.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container">
            <div class="jumbotron">
                <img id="logo" src="images/Logo.png" alt="CWI logo" />	
            </div>

            <?php
            $selectedQuizId = htmlspecialchars($_POST['quizSelect']);

            $sql = "SELECT quizName
                        FROM quizzes
                        WHERE quizID = " . $selectedQuizId;
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<h3>" . $row[quizName] . " Assessment Quiz</h3>";
                }
            } else {
                echo "No results found.";
            }
            ?>

            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="results.php" method="post">
                        <?php
                        $i = 1;
                        $sql = "SELECT questionContent, questionID
                                    FROM questions
                                    WHERE quizID = " . $selectedQuizId;
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $sql2 = "SELECT answerContent, answerID
                                     FROM answers
                                     WHERE questionID = " . $row[questionID];
                                $result2 = mysqli_query($conn, $sql2);
                                echo "<h4>Question " . $i . "</h4>
                                          <p>" . $row[questionContent] . "</p>";
                                // keep track of the questions id
                                echo "<input type='hidden' name='questionID-$i' value='{$row[questionID]}'>";
                                if (mysqli_num_rows($result2) > 0) {
                                    while($row = mysqli_fetch_assoc($result2)) {
                                        echo "<input type='radio' 
                                                            name='answer" . $i . "' 
                                                            value='" . $row[answerID] . "'
                                                            required >" . 
                                            $row[answerContent] . 
                                            "<br>";
                                    }
                                } else {
                                    echo "No results found.";
                                }
                                ++$i;
                            }
                        } else {
                            echo "No results found.";
                        }

                        ?>
                        <hr>
                        <h3>Student Information</h3>
                        <input class="studentInfo" type="text" name="studentEmail" placeholder="Email" required><span class="required">*</span><br><br>
                        <input class="studentInfo" type="text" name="studentFName" placeholder="First Name" required><span class="required">*</span><br><br>
                        <input class="studentInfo" type="text" name="studentLName" placeholder="Last name" required><span class="required">*</span><br><br>
                        <input class="studentInfo" type="text" name="studentId" placeholder="Student ID">

                        <?php
                        echo "<input type='hidden' name='selectedQuizID' value='" . $selectedQuizId . "'>";
                        echo "<input type='hidden' name='numOfQuestions' value='" . $i . "'>";
                        ?>
                        </br>
                    <input class="btn btn-default" name="submit" type="submit" value="Submit">
                    </form>

            </div>
        </div>
        </div>
    </div>
</body>
</html>
