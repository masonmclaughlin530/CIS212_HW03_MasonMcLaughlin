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
        echo "<h1> GOOD CONNECTION </h1>";
        
    }

    echo "<h1> test1 </h1>";

    if(isset($_POST['restart']))
    {
        echo "<h1> test </h1>";
        $username = $_POST["game_username"];
        $score = $_POST["game_clicks"];
        $cps = $_POST["game_cps"];

        echo $score;

        if($score == "" || $score == "0")
        {
            echo "<h1> Test3 </h1>";    
        echo "<script type = 'text/javascript'> location.href = 'game.html'; </script>";
        return;

        }

        echo "<h1> Test2 </h1>";
        $score = intval($score);
        $cps = intval($cps);


        $sql = "INSERT INTO clickScores (username, totalClicks, clicksPerSecond) VALUES ('" . $username . "', '" . $score . "', '" . $cps . "');";

    if ($conn->query($sql) == true)
    {
        echo "GOOD";

        echo "<script type = 'text/javascript'> location.href = 'game.html'; </script>";
    }
    else
    {
        echo "Error";
    }
    }

    

    

    //get 

?>