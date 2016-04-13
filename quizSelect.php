<head>
<?php require 'connection.php';?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<div class="container">
<h3>Select your quiz!</h3>
<div class="panel panel-default">
  <div class="panel-body">
<form>
<input type="radio" name="quizSelect" checked>General</input><br>
<input type="radio" name="quizSelect">Networking</input><br>
<input type="radio" name="quizSelect">Information Technology</input><br>
<input type="radio" name="quizSelect">Software Development</input><br>

<input type="text" name="studentEmail" value="email" autofocus=""><br>


<a href="preQuiz.html"><button type="button" class="btn btn-success">Go!</button></a>
</form>
<?php
                        $sql = "SELECT Test_ID, 
                                        Test_Name 
                                FROM 
                                        test";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<p class='id'> id: " . $row["Test_ID"] . "</p>" . 
                                    "Name: " . $row["Test_Name"] . 
                                    "<br><br>";
                            }
                        } else {
                            echo "0 results.";
                        }
                    ?>

</div>
</div>
</div>