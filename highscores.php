<?php
$servername = "localhost";
$db_username = "mmclaughlin";
$db_password = "password";
$db_name = "inClassDb";

$conn = new mysqli($servername, $db_username, $db_password, $db_name);

if($conn->connect_error)
{
    die("connect failed: " . $conn->connect_error);
    
}
else
{
    //echo "<h1> GOOD CONNECTION </h1>";
}


if(isset($_GET['highToLow']))
{
    $sql = 'SELECT * FROM scores ORDER BY totalClicks';
    
}

if(isset($_GET['user']))
{
    $user = $_GET['highscore_username'];

    $sql = "SELECT * FROM scores WHERE username = '" . $user . "' ORDER BY totalClicks";
}

if(isset($_GET['lowToHigh']))
{
    $sql = 'SELECT * FROM scores ORDER BY totalClicks DESC';
}



$results = $conn->query($sql);


$i = 0;

if($results->num_rows > 0)
{
    while($row = $results->fetch_assoc())
    {
        echo "<tr><td>" . $row['username'] . "</td><td>" . $row['totalClicks'] . "</td><td>" . $row['clicksPerSecond'] . "</td><td>" . $row['date'] . "</td><tr>";
        $i++;
        if ($i >= 10)
        {
            break;
        }
    }
}

echo "<script>sessionStorage.setItem('highscores','" . $highscores ."');</script>";
echo "<script>location.href = 'highscores.html'</script>";


?>