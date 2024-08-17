<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// connect with database:-

$db = "form";
$username = 'root';
$server = 'localhost';
$pass = '';

$con = mysqli_connect($server,$username,$pass,$db);

$id = $_GET['id'];

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $degree = $_POST['degree'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $refer = $_POST['refer'];
    $jobpost = $_POST['jobpost'];

   
    

    $update= "UPDATE `crud` SET `ID`='$id',`NAME`='$name',
    `DEGREE`='$degree',`MOBILE`='$mobile',`EMAIL`='$email',
    `REFER`='$refer',`JOBPOST`='$jobpost' WHERE `ID`=$id";

$upres = mysqli_query($con,$update);

if($upres){
    echo "updated";
}else{
    echo "not updated";
}
  
}

$selectUp = "SELECT * from CRUD WHERE id = '$id'";

$fetchRes = mysqli_query($con,$selectUp);
echo "\n";
$data = array();
while($fetchArr = mysqli_fetch_array($fetchRes)){
    $data[] = $fetchArr;
}
$resFetch = json_encode($data);  // json_encode($data): Converts PHP data to JSON format.
echo $resFetch;

if(isset($_POST['delete'])){
    $del = "DELETE FROM `crud` WHERE `ID` = '$id'";
}

$delres = mysqli_query($con,$del);

?>