<!DOCTYPE html>
<html>

<style>
div
{
    text-align: center;
}

.btn
{
    width: 100px;
}

body 
{ 
        font-family: Arial, sans-serif; 
        margin: 0; 
        padding: 0; 
} 

header 
{ 
    background-color: #ffffff; 
    color: #000000; 
    text-align: center; 
} 
.container 
{ 
    display: flex; 
    justify-content: space-between; 
    max-width: 95%; 
    margin: 0 auto; 
    padding: 20px; 
} 
nav 
{ 
    background-color: #242424; 
    padding: 10px; 
} 

nav a 
{ 
    color: #fff; 
    text-decoration: none; 
    padding: 10px; 
    margin-right: 10px; 
    display: inline-block; 
}

table.highscoreTable
{
    margin-left: auto;
    margin-right: auto;
}

</style>


<script scr="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script scr="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/popper.min.js"></script>
<script scr="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootsrap/bootstrap.min.js"></script>


<link rel="stylesheet" href="style.css">
<script src="scripts.js"></script>




<title>Click Counter</title>
<head>
    
    <body>
        <header><h1>Click Counter</h1>
        
        </header>

        <nav>
            <a href="index.html">Home</a>
            <a href="register.html">Register</a>
            <a href="game.html">Click Counter</a>
            <a href="highscoresPage.php">Highscores</a>
        </nav>
    </body>
</head>

<script src="scripts.js"></script>
<body onload="highScoreLoad()">
    <h1>Highscores</h1>
    
    <div class="row"></div>

    <form action="" method="get" id="highscoreForm">
        <div>
            <input type="hidden" name="highscore_username" id="highscore_username" value="">
            <input type="submit" name="highToLow" value="All User HighScores" id="highToLow">
            <input type="submit" name="user" value="Your HighScores" id="user">
            <input type="submit" name="lowToHigh" value="All User Low Scores" id="lowToHigh">


            

        </div>
    </form>

    <div>
    <table id = "highscoreTable">
        <tr>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Score</th>
            <th>Clicks Per Second</th>
            <th>Date</th>
        </tr>


        <?php
//session_start();
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
    $user = $_GET['highscore_username'];

    $sql = "SELECT * FROM clickScores ORDER BY totalClicks DESC";

    

    $results = $conn->query($sql);

    

    

    $i = 0;

    if($test = mysqli_query($conn, $sql))
    {
        $rowCount = mysqli_num_rows($test);
        //echo "<h1> Good </h1>";
    }
    else
    {
        //echo "<h1> Bad </h1>";
    }

    if($results->num_rows > 0)
    {
        while($row = $results->fetch_assoc())
        {
            if($i < 10)
            {
                $findFname = $row['username'];

                $getUser = "SELECT * FROM users Where username = '$findFname'";

                $found = $conn->query($getUser);

                $getVariables = $found->fetch_assoc();

                $fname = $getVariables['fname'];

                $lname = $getVariables['lname'];

                echo "<tr>" . "<td>" . $row['username'] . "</td>". "<td>" . $fname . "</td>" . "<td>" . $lname . "</td>". "<td>" . $row['totalClicks'] . "</td>" . "<td>" . $row['clicksPerSecond'] . "</td>" . "<td>" . $row['date'] . "</td>" . "<tr>";
                $i++;
            }
        }
    }
}
else
{
    //echo "none";
}
    



if(isset($_GET['user']))
{

    $user = $_GET['highscore_username'];


    $sql = "SELECT * FROM clickScores WHERE username = '$user' ORDER BY totalClicks DESC";

    $results = $conn->query($sql);

    

    $i = 0;

    if($test = mysqli_query($conn, $sql))
    {
        $rowCount = mysqli_num_rows($test);
        //echo "<h1> Good </h1>";
    }
    else
    {
        //echo "<h1> Bad </h1>";
    }

    if($results->num_rows > 0)
    {
        while($row = $results->fetch_assoc())
        {
            if($i < 10)
            {
                $findFname = $row['username'];

                $getUser = "SELECT * FROM users Where username = '$findFname'";

                $found = $conn->query($getUser);

                $getVariables = $found->fetch_assoc();

                $fname = $getVariables['fname'];

                $lname = $getVariables['lname'];

                echo "<tr>" . "<td>" . $row['username'] . "</td>". "<td>" . $fname . "</td>" . "<td>" . $lname . "</td>". "<td>" . $row['totalClicks'] . "</td>" . "<td>" . $row['clicksPerSecond'] . "</td>" . "<td>" . $row['date'] . "</td>" . "<tr>";
                $i++;    
            }
        }
    }
}
else
{
    //echo "none";
}




if(isset($_GET['lowToHigh']))
{
    $sql = "SELECT * FROM clickScores ORDER BY totalClicks";

    $results = $conn->query($sql);

    

    $i = 0;

    if($test = mysqli_query($conn, $sql))
    {
        $rowCount = mysqli_num_rows($test);
        //echo "<h1> Good </h1>";
    }
    else
    {
        //echo "<h1> Bad </h1>";
    }

    if($results->num_rows > 0)
    {
        while($row = $results->fetch_assoc())
        {
            if($i < 10)
            {
                $findFname = $row['username'];

                $getUser = "SELECT * FROM users Where username = '$findFname'";

                $found = $conn->query($getUser);

                $getVariables = $found->fetch_assoc();

                $fname = $getVariables['fname'];

                $lname = $getVariables['lname'];

                echo "<tr>" . "<td>" . $row['username'] . "</td>". "<td>" . $fname . "</td>" . "<td>" . $lname . "</td>". "<td>" . $row['totalClicks'] . "</td>" . "<td>" . $row['clicksPerSecond'] . "</td>" . "<td>" . $row['date'] . "</td>" . "<tr>";
                $i++;    
            }
        }
    }
}
else
{
    //echo "none";
}



?>

        </table>
    
    </div>
</body>





</html>