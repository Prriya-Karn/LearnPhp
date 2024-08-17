<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// connect with database:-

$db = "form";
$username = 'root';
$server = 'localhost';
$pass = '';

$con = mysqli_connect($server,$username,$pass,$db);

// if($con){
//     echo "connection successful";
// }else{
//     echo "not connected with database";
// }



if(isset($_POST['submit'])){

    $ids = $_POST['id']; 
    $name = $_POST['name'];
    $degree = $_POST['degree'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $refer = $_POST['refer'];
    $jobpost = $_POST['jobpost'];

    $insert = "insert into crud(NAME,DEGREE,MOBILE,EMAIL,REFER,JOBPOST)
    values('$name','$degree','$mobile','$email','$refer','$jobpost')";



}
    $resOfInsert = mysqli_query($con, $insert);
    if($resOfInsert){
       ?>
       <script>
        alert("inserted");
       </script>
       <?php
    }else{
        ?>
        <script>
         alert("not inserted");
        </script>
        <?php
    }


?>


