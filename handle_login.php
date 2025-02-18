<?php
session_start();
include 'condb.php';


$email = $_POST['email'];
$password = $_POST['password'];


$sql="SELECT * FROM students_list WHERE email = '$email' and password = '$password' ";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$status = $row['status'];

if($row > 0){
    $_SESSION["id"] = $row['student_id'];
    $_SESSION["email"] = $row['email'];
    $_SESSION["name"] = $row['name'];
    $_SESSION["score"] = $row['student_point']; 
    $_SESSION["vocation"] = $row['vocation'];
    $_SESSION["room"] = $row['room'];
    $_SESSION["major"] = $row['major'];

    if($status == '0'){
        $show=header("location:dashboard.php");
        exit(); 
    }elseif($status == '1'){
        $show=header("location:index.php");
        exit(); 
    }
}else{
    $_SESSION["Error"] = "<p>Your id or password is invaild </p>";
    $show=header("location:login.php");
    exit();
}
echo $show;
?>