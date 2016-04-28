<?php 
// put on any page that needs to be protected
session_start(); 
if(!isset($_SESSION["user"])) header("location: login.php"); 
?>

<!doctype html>
<html lang="en">
    <head>
        <?php require 'connection.php';?>
        
        <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>

        <meta charset="utf-8" />

        <title>Interest Assessment Quiz Edit</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <!-- user edit css -->
        <link rel="stylesheet" type="text/css" href="css/customstyles.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>

    <body>
        <?php 
        // this is to display the instructor info and their quiz
        $emailSubmitted = htmlspecialchars($_SESSION["user"]);

        $sql = "SELECT instructors.instructorID, instructors.instructorEmail, quizzes.quizID, quizzes.quizName, instructors.instructorFirst, instructors.instructorLast 
                FROM instructors JOIN quizzes 
                WHERE instructors.instructorID = quizzes.instructorID AND instructors.instructorEmail = '" . $emailSubmitted."'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $quizID = $row['quizID'];
                $quizName = $row['quizName'];
                $instructorName = $row['instructorFirst']. " " .$row['instructorLast'];
            }
        } else {
            echo "no results found";
        }
        ?>

        <div class="container">
            <div class="jumbotron">
                <img id="logo" src="images/Logo.png" />   
                <h3>Edit your quiz</h3>
                <div class="row text-right">
                    <div class="col-lg-12">
                        <p>Welcome, <?php echo $instructorName; ?></p>
                        <span><a href="login.php?logout=1"><button type="button" class="btn btn-default">Log Out</button></a></span></p>
                </div>
            </div>    
        </div>

        <a href="admin.php"><button type="button" class="btn btn-default">Go Back</button></a>
        <a href="addQuestion.php"><button type="button" class="btn btn-default">Add Question</button></a>

        <div class="container">            
            <h3>Your Selected Quiz</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php
                    $i = 1;
                    $sql = "SELECT questionContent, questionID
                            FROM questions
                            WHERE quizID = " . $quizID;
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sql2 = "SELECT answerContent, answerID
                                     FROM answers
                                     WHERE questionID = " . $row[questionID];
                            $result2 = mysqli_query($conn, $sql2);
                            
                            echo "<form action='quizEdit.php' method='post'>";

                            echo "<h4>Question " . $i . "</h4>
                                    <input class='quizEditInput' 
                                            type='text' 
                                            name='questionID" . $row[questionID] . "' 
                                            value='" . $row[questionContent] . "'>";
                            echo "<br><br>";
                            if (mysqli_num_rows($result2) > 0) {
                                while($row2 = mysqli_fetch_assoc($result2)) {
                                    echo "<input class='quizEditInput' type='text' name='answerID" . $row2[answerID] . "' value='" . $row2[answerContent] . "'><br>";
                                }
                            } else {
                                echo "No results found.";
                            }
                            echo "<input class='btn btn-default quizUpdateButton' name='update" . $row[questionID] . "' type='submit' value='Update'";
                            echo "</form>";
                            ++$i;
                        }
                    } else {
                        echo "No results found.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
