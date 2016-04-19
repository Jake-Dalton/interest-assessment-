<!doctype html>
<html lang="en">
    <head>
        <?php require 'connection.php';?>

        <meta charset="utf-8" />
        <title>Interest Assessment Results</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous" />
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous" />
        <!-- user edit css -->
        <link rel="stylesheet" type="text/css" href="css/results.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/resultsPrint.css" media="print"/>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container">
            <div class="jumbotron">
                <img id="logo" src="images/Logo.png" />   
                <div class="row text-center">
                    <h3>Results</h3>
                    <div class="col-lg-12">
                        <button type='button' class='btn btn-default'><a href="index.html">Home</a></button>
                    </div>
                </div>
            </div>

            <?php
            $i = 1;
            $selectedQuizID = intval($_POST['selectedQuizID']);
            $numOfQuestions = intval($_POST['numOfQuestions']);
            $numCorrect = 0;
            $percentCorrect = 0;

            // Set up selectedAnswer variables for however many questions there are.
            while ($i <= $numOfQuestions) {
                ${selectedAnswer . $i} = intval($_POST['answer' . $i]);
                $i++;
            }

            $email = htmlspecialchars($_POST['studentEmail']);
            $fName = htmlspecialchars($_POST['studentFName']);
            $lName = htmlspecialchars($_POST['studentLName']);
            $studentID = intval($_POST['studentID']);

            //            // echo testing
            //            echo "Quiz ID: " . $selectedQuizID . "<br>" . 
            //                "Number of Questions: " . $numOfQuestions . "<br>" . 
            //                "Selected Answer 1: " . $selectedAnswer1 . "<br>" .  
            //                "Selected Answer 2: " . $selectedAnswer2  . "<br>" . 
            //                "Selected Answer 3: " . $selectedAnswer3  . "<br>" . 
            //                "Selected Answer 4: " . $selectedAnswer4  . "<br>" . 
            //                "Selected Answer 5: " . $selectedAnswer5  . "<br>" . 
            //                "Email: " . $email  . "<br>" . 
            //                "First Name: " . $fName  . "<br>". 
            //                "Last Name: " . $lName  . "<br>". 
            //                "Student ID: " . $studentId . "<br>";
            //
            //            // end echo testing

            // Find out if selected answers are correct
            $i = 1;
            while ($i <= $numOfQuestions) {

                $sql = "SELECT * 
                        FROM answers
                        WHERE isCorrect = 1 
                        AND answerID = " . ${selectedAnswer . $i};

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $numCorrect++;
                    }
                } else {
                }
                $i++;
            }

            //            echo "<br> Number Correct: " . $numCorrect;

            $percentCorrect = ($numCorrect / $numOfQuestions) * 100;
            $percentCorrect = round($percentCorrect);

            //            echo "<br> Precent Correct: " . $percentCorrect * 100 . "%";

            ?>

            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php
                            echo "<h4>Test results for " . $fName . " " . $lName . "</h4>";
                            ?>
                            <ul>
                                <?php
                                $sql = "SELECT quizName
                                        FROM quizzes
                                        WHERE quizID = " . $selectedQuizID;

                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<li>You completed the " . $row[quizName] . " assesment test.</li>";
                                    }
                                } else {
                                    echo "No results found.";
                                }
                                ?>
                                <?php echo "<li>Your score was: " . $percentCorrect . "%</li>"; ?>
                                <?php echo "<li>Placeholder Bullet for Box formatting</li>"; ?>
                            </ul>
                            <div class="text-right">
                                <button onclick="printThis()" type="button" class="btn btn-default">Print Now</button>
                                <script>
                                    function printThis() {
                                        window.print();
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4>Instructor Info:</h4>
                            <ul>
                                <!-- Need to update this SELECT statement to join with quizzes rather than just use the quizID as the instructorID -->
                                <?php
                                $sql = "SELECT instructors.instructorPhone, instructors.instructorEmail, instructors.instructorFirst, instructors.instructorLast 
                                        FROM instructors JOIN quizzes 
                                        WHERE quizzes.instructorID = instructors.instructorID AND quizzes.quizID =" . $selectedQuizID;

                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<li><b>Name:</b> " . $row[instructorFirst] . " " .  $row[instructorLast] . "</li>";
                                        echo "<li><b>Phone:</b> " . $row[instructorPhone] . "</li>"; // Formatting of phone number?
                                        echo "<li><b>Email:</b> " . $row[instructorEmail] . "</li>";
                                    }
                                } else {
                                    echo "No results found.";
                                }
                                ?>
                            </ul>
                            <div class="text-right">
                                <button type='button' class='btn btn-default'><a href='mailto:<?php
                                    $sql = "SELECT instructorEmail
                                        FROM instructors JOIN quizzes 
                                        WHERE quizzes.instructorID = instructors.instructorID AND quizzes.quizID =" . $selectedQuizID;

                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo $row[instructorEmail];
                                        }
                                    }
                                    ?>?Subject=Test%20Results'>Email Now</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- closes container -->

        <!-- Insert information into the database -->
        <?php

        $quizID = intval($_POST['selectedQuizID']);
        $studentEmail = htmlspecialchars($_POST['studentEmail']);
        $studentFName = htmlspecialchars($_POST['studentFName']);
        $studentLName = htmlspecialchars($_POST['studentLName']);
        $studentID    = intval($_POST['studentID']);        
        $mysqltime = date("Y-m-d H:i:s");

        $sql = "INSERT INTO responses 
                (responseID, quizID, studentEmail, studentFirst, studentLast, studentCwiID, studentScore, submitTime)
                VALUES
                (null, '$quizID', '$studentEmail', '$studentFName', '$studentLName', '$studentID', '$percentCorrect', '$mysqltime')";

        $result = mysqli_query($conn, $sql);

        ?>
    </body>
</html>
