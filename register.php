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

 if(isset($_POST['register_registerBtn']))
 {
    $username = $_POST['register_username'];
    $fname = $_POST['register_fname'];
    $lname = $_POST['register_lname'];
    $password = $_POST['register_password'];

    $sqlUserNameCheck = "SELECT username FROM users WHERE username = '". $username . "';";

    $search = $conn->query($sqlUserNameCheck);

    if($search->num_rows <=0 && $username != "")
    {
        $insert = "INSERT INTO users VALUES ('" . $username . "','" . $fname . "','" . $lname . "','" . $password . "');";

        if($conn->query($insert) == true)
        {
        echo "<script>location.href='index.html'</script>";
        }
        else
        {
            echo "Error";
            echo "<script>location.href='register.html'</script>";
        }
    } 
    else
    {
        echo "Error";
        echo "<script>location.href='register.html'</script>";
    }
 }



?>