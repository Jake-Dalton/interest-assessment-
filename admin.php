<!DOCTYPE html>
<html>
<head>
    <?php require 'connection.php';?>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- admin css -->
    <link rel="stylesheet" type="text/css" href="css/admin.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
    
<body>

<?php 
// this is to display the instructor info and their quiz
        $emailSubmitted = htmlspecialchars($_POST['instructorEmail']);
        
        $sql = "SELECT instructors.instructorID, instructors.instructorEmail, quizzes.quizID, quizzes.quizName, instructors.instructorFirst, instructors.instructorLast FROM instructors JOIN quizzes WHERE instructors.instructorID = quizzes.instructorID AND instructors.instructorEmail = '" . $emailSubmitted."'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $quizID = $row['quizID'];
                                $quizName = $row['quizName'];
                                $instructorName = $row['instructorFirst']. " " .$row['instructorLast'];
                            }
                        } else {
                            echo "no results found";
                            echo "<br> ".$emailSubmitted;
                        }
?>



    <div class="container">
        <div class="jumbotron">
            <img id="logo" src="images/Logo.png" />	
            <h3>Admin Panel</h3>
            <div class="row text-right">
                <div class="col-lg-12">
                    <p><?php echo $instructorName; ?></p><span><a href="login.html"><button type="button" class="btn btn-default">Log Out</button></a></span></p>
                </div>
            </div>
        </div>

        <div id="quizResults">
            <h4>Quiz Results</h4>
            <table class="table table-bordered">
                <tr>
                    <th>Student First Name</th>
                    <th>Student Last Name</th>
                    <th>Student Email</th>
                    <th>Student CWI ID</th>
                    <th>Quiz Taken</th>
                    <th>Score</th>
                </tr>
                <?php
    $sql = "SELECT * FROM responses WHERE quizID = ".$quizID;
    $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                             echo "<tr> 
                                <td>".$row['studentFirst']."</td>
                                <td>".$row['studentLast']."</td>
                                <td>".$row['studentEmail']."</td>
                                <td>".$row['studentCwiID']."</td>
                                <td>".$row['submitTime']."</td>
                                <td></td>
                             </tr>";
                            }
                        } else {
                            echo "no results found";
                        }
?>
                <tr>
                    <td>Data</td>
                    <td>Data</td>
                    <td>Data</td>
                    <td><?php echo $quizName ?></td>
                    <td>Data</td>
                    <td>Data</td>
                <td>
                    <button type="button" class="btn btn-default">View</button>
                    <button type="button" class="btn btn-default">Delete</button>
                </td>
                </tr>
            </table>
        </div> <!-- quizResults -->

        <div class="row" id="yourQuiz">
            <div class="col-lg-12">
                <h4><?php echo $quizName ?></h4>
                <div class="panel panel-default">
                    <div class="panel-body">
                        YOUR QUIZ NAME & SOME DETAILS?
                    </div>
                </div>
                <a href="quizEdit.php"><button type="button" class="btn btn-default">Edit Quiz</button></a>
            </div>
        </div><!--Your Quiz Row -->
    </div> <!-- container -->
</body>
</html>


