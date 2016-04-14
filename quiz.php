<!DOCTYPE html>
<html>
    <head>
        <?php require 'connection.php';?>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    
    <body>
        <div class="container">


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
                                            if (mysqli_num_rows($result2) > 0) {
                                                while($row = mysqli_fetch_assoc($result2)) {
                                                    echo "<input type='radio' 
                                                            name='answer" . $i . "' 
                                                            value='" . $row[answerID] . 
                                                            "'>" . 
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
                    
                <input type="text" name="studentEmail" value="Email" autofocus=""><br>
            <input type="text" name="studentFName" value="First Name"><br>
            <input type="text" name="studentLName" value="Last name"><br>
            <input type="text" name="studentId" value="Student ID"><br>

            <input type="submit" value="Submit">
            </form>

                     
                </div>
            </div>
        </div>
    </body>
</html>