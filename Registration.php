<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");


$server = "localhost";
$password = "";
$username = "root";
$db = "form";

$con = mysqli_connect($server,$username,$password,$db);


if(isset($_POST['register'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $enPass = password_hash($password,PASSWORD_BCRYPT);
    echo $enPass;

    $cpassword = $_POST['cpassword'];

    $insertData = "insert into registration(FNAME,LNAME,EMAIL,COUNTRY,NUMBER,PASSWORD,CPASSWORD) 
    values('$fname','$lname','$email','$country','$number','$enPass','$cpassword')";
    $insertRes = mysqli_query($con,$insertData);
    $insertRes.json_encode();

    // if($insertRes){
    //     echo "inserted";    
    // }else{
    //     echo "not inserted";
    // }    
}


$fetchregisdta = "select FNAME,PASSWORD from registration";
$fetchRegisRes = mysqli_query($con,$fetchregisdta);

$fetcReg = array();
while($fetchResArr = mysqli_fetch_array($fetchRegisRes)){
    $fetcReg[] = $fetchResArr;
}

$res = json_encode($fetcReg);
echo $res;

?>