<?php
            $serverName = "172.30.0.30";
            $userName = "iaa_user";
            $passWord = 'Apin1402EagleFlight.';
            $dbName = "iaa";

            $conn = new mysqli($serverName, $userName, $passWord, $dbName);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        ?> 