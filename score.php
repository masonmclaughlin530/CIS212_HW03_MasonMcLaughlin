<?php
    $servername = "localhost";
    $db_username = "mmclaughlin";
    $db_password = "password";
    $db_name = "inClassDb";
   
    $conn = new mysqli($servername, $db_username, $db_password, $db_name);
   
    if($conn->connect_error)
    {
        die("connect failed: " . $conn->connect_error);
        //echo "<script>location.href='index.html'</script>";
    }
    else
    {
        //echo "<h1> GOOD CONNECTION </h1>";
    }

    $score = $_POST['score'];
    $cps = $_POST['cps'];
    $username = $_POST['username'];

    $sql = "INSERT INTO clickScores (username, totalClicks, clicksPerSecond) VALUES ('" . $username . "', '" . $score . "', '" . $cps . "');";

    if ($conn->query($sql) == true)
    {
        echo "GOOD";
    }
    else
    {
        echo "Error";
    }


?>