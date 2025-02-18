<?php
include "condb.php";

$id = $_POST['student_id'];
$name = $_POST['name'];
$vocation = $_POST['vocation'];
$room = $_POST['room'];
$major = $_POST['major'];
$email = $_POST['email'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);


// ใช้ prepared statements เพื่อป้องกัน SQL Injection
$sql = "INSERT INTO students_list (student_id, name, vocation, room, major, email, password) VALUES ('$id', '$name', '$vocation', '$room', '$major', '$email', '$password')";
$result = mysqli_query($conn,$sql);

    if ($result) {
        echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script> ";
        echo "<script> window.location='index.php'; </script> ";
    } else {
        echo "Error: " . mysqli_error($conn);
        echo "<script> alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล'); </script> ";
    }

mysqli_close($conn);
?>