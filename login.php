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

//get username and password
$username = $_POST['index_username'];
$password = $_POST['index_password'];


$sql = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "';";
//check username and password
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
    echo "<script>sessionStorage.setItem('usernamestored','" . $username . "');</script>";
    echo "<script>location.href = 'game.html';</script>";
}
else
{
    //user not found
    //for now reload page
    //not sure how to show errors and remove them
    echo "<script>location.href='index.html';</script>";
}



?>