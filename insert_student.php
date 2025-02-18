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

//ใช้ if else ในการตรวจสอบการทำงาน
if ($result) { //ในกรณีที่สามารถทำงานได้ตามปกติให้sweetalertทำงานตามนี้
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<body><script>
        Swal.fire({
            title: 'บันทึกสำเร็จ!',
            text: 'ข้อมูลถูกบันทึกเรียบร้อยแล้ว',
            icon: 'success',
            confirmButtonText: 'ตกลง'
        }).then(() => {
            window.location = 'index.php';
        });
    </script></body>";
} else {  //ในกรณีที่ "ไม่" สามารถทำงานได้ตามปกติให้sweetalertทำงานตามนี้
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<body><script>
        Swal.fire({
            title: 'เกิดข้อผิดพลาด!',
            text: 'ไม่สามารถบันทึกข้อมูลได้',
            icon: 'error',
            confirmButtonText: 'ลองอีกครั้ง'
        }).then(() => {
            window.location = 'add_student.php';
        });
    </script></body>";
}
?>
