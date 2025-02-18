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
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <body><script>
            Swal.fire({
                title: 'ลงทะเบียนสำรเ็จ!',
                text: 'ลงทะเบียนเสร็จเรียบร้อยแล้ว',
                icon: 'success',
                confirmButtonText: 'ตกลง'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = 'index.php'; // เปลี่ยนเส้นทางกลับไปยังหน้าแรก
                }
            });
        </script></body>
        ";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
         <body><script>
            Swal.fire({
                title: 'ลงทะเบียนล้มเหลว!',
                text: 'เกิดข้อผิดพลาดในการลงทะเบียน',
                icon: 'error',
                confirmButtonText: 'ลองอีกครั้ง'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = 'register.php'; // เปลี่ยนเส้นทางกลับไปยังหน้าแรก
                }
            });
        </script></body>
        ";
    }

mysqli_close($conn);
?>