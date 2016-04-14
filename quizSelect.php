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
        <h3>Select your quiz!</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                <form>
                <?php
                    $sql = "SELECT quizName, 
                                   quizID
                            FROM quizzes";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<input type='radio' name='quizSelect' value='" . $row[quizID] . "'>" . $row[quizName] . "</input><br>";
                        }
                    }else {
                        echo "No results found.";
                    }
                ?>

                <input type="text" name="studentEmail" value="email" required autofocus=""><br>
                <input type="text" name="studentFName" value="first name"><br>
                 <input type="text" name="studentLName" value="last name"><br>
                <input type="text" name="studentEmail" value="studentID"><br>

                <a href="preQuiz.html"><button type="button" class="btn btn-success">Go!</button></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>