<?php
    $sql = "SELECT instructorID, 
                    role 
            FROM 
                    instructors";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<p class='id'> id: " . $row["instructorID"] . "</p>" . 
                "Name: " . $row["role"] . 
                "<br><br>";
        }
    } else {
        echo "No results found.";
    }
?>

<?php
    $sql = "SELECT quizName, 
                   quizID
            FROM quizzes";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<input type='radio' name='quizSelect' value='" . 
                $row[quizID] . "'>" . 
                $row[quizName] . 
                "</input><br>";
        }
    }else {
        echo "No results found.";
    }
?>