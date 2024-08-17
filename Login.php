<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$server = "localhost";
$password = "";
$username = "root";
$db = "form";

$con = mysqli_connect($server, $username, $password, $db);

if (isset($_POST['submit'])) {
    $uname = $_POST['uname'];
    $password = $_POST['pass'];
   

    echo $uname;

    // Fetch the password from the registration table for the same username
    $fetchPass = "SELECT PASSWORD FROM registration WHERE FNAME = '$uname'";
    $conFetch = mysqli_query($con, $fetchPass);
    $fetcArr = mysqli_fetch_array($conFetch);

    if ($fetcArr) {
        $storedPass = $fetcArr['PASSWORD'];

        // Compare the input password with the stored hashed password
        if (password_verify($password, $storedPass)) {
           
          echo "true";
        } else{
            
           echo "false";
        }
    } else {
        echo "User not found or no password stored.";
    }
}
?>
