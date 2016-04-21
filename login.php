<!DOCTYPE html>
<html>
    <head>
        <?php require 'connection.php';?>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- login css -->
        <link rel="stylesheet" type="text/css" href="css/login.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container">
            <div class="jumbotron">
                <img id="logo" src="images/Logo.png" />   
                <h2>Please sign in</h2>
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div>
                        </div>
                    </div>
                    <form class="form-signin" method="post" action="admin.php">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" name="instructorEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        <div class="checkbox">

                        </div>
                        <input class="btn btn-lg btn-primary btn-block" name="login" type="submit" value="Sign in">
                    </form>

                </div>
            </div>
        </div><!-- /container -->

<!--        Password verification attempt: -->
        <?php 
        if(isset($_POST['login'])) {
            $userName = mysql_real_escape_string($_POST['instructorEmail']);
            $password = mysql_real_escape_string($_POST['password']);

            $sql = "SELECT * 
                    FROM instructors 
                    WHERE instructorEmail = '$userName'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    if($row['instructorPassword'] == $password)
                    {
                        echo $row['instructorFirst'];
                    }
                }
            } else {
                echo "Incorrect user name or password.";
            }
        }
        ?>

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>