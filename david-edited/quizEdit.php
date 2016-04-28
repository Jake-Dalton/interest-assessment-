<?php 
	// put on any page that needs to be protected
	session_start(); 
	if(!isset($_SESSION["user"])) header("location: login.php"); 
?>

<!doctype html>
<html lang="en">
    <head>
        <?php require 'connection.php';?>

        <meta charset="utf-8" />

        <title>Interest Assessment Quiz Edit</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <!-- user edit css -->
        <link rel="stylesheet" type="text/css" href="css/quizEdit.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container">
            <div class="jumbotron">
                <img id="logo" src="images/Logo.png" />   
                <h3>Edit your quiz</h3>
                <div class="row text-right">
                    <div class="col-lg-12">
                        <p>Admin Name Here</p><span><a href="login.php?logout=1"><button type="button" class="btn btn-default">Log Out</button></a></span></p>
                </div>
            </div>    
        </div>

        <a href="admin.php"><button type="button" class="btn btn-default">Go Back</button></a>
        <a href="addQuestion.php"><button type="button" class="btn btn-default">Add Question</button></a>

        <div class="container">
            <h3>Your Selected Quiz</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Question 1</h4>
                    <p><input type="text" name="q1" value="What is blah blah of the bloborian root of blah?"> </p>
                    <form>
                        <input type="text" name="q1a" value="bloop">
                        <br>
                        <input type="text" name="q1a" value="Shawdy">
                        <br>
                        <input type="text" name="q1a" value="Big Ol Macs">
                        <br>
                        <input type="text" name="q1a" value="Camels">
                        <br>
                        <br>
                        <button type="button" class="btn btn-default">Update</button>
                    </form>
                    <h4>Question 2</h4>
                    <p><input type="text" name="q2" value="What is blah blah of the bloborian root of blah?"></p>
                    <form>
                        <input type="text" name="q2a" value="bloop">
                        <br>
                        <input type="text" name="q2a" value="Shawdy">
                        <br>
                        <input type="text" name="q2a" value="Big Ol Macs">
                        <br>
                        <input type="text" name="q2a" value="Camels">
                        <br>
                        <br>
                        <button type="button" class="btn btn-default">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </body>
</html>
