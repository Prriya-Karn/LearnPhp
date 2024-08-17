<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");


$db = "form";
$username = 'root';
$server = 'localhost';
$pass = '';

$con = mysqli_connect($server,$username,$pass,$db);




//-------------------------- data fetch ------------

$fetchData = "SELECT * from CRUD";
$fetchRes = mysqli_query($con,$fetchData);
echo "\n";
$data = array();
while($fetchArr = mysqli_fetch_array($fetchRes)){
    $data[] = $fetchArr;
}
$resFetch = json_encode($data);  // json_encode($data): Converts PHP data to JSON format.
echo $resFetch;




?>