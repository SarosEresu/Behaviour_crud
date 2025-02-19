<!-- หน้าสำหรับ สั่งการการล็อคอิน  -->
<?php
session_start();
include 'condb.php'; /* เชื่อมฐานข้อมูล */
 
$email = $_POST['email']; /* รับค่าข้อมูล */
$password = $_POST['password']; /* รับค่าข้อมูล */

$sql = "SELECT * FROM students_list WHERE email = '$email' and password = '$password'"; /* โค๊ดภาษา sql */
$result = mysqli_query($conn, $sql); /* สั่งใช้งาน sql */
$row = mysqli_fetch_array($result);
$status = $row['status'];

if ($row > 0) { /* ตรวจสอบว่าค่าข้อมูลมีในฐานข้อมูลจริงๆไหม */
    $_SESSION["id"] = $row['student_id']; /* นำข้อมูลที่ไปรับไปเก็บใน session */
    $_SESSION["email"] = $row['email'];
    $_SESSION["name"] = $row['name'];
    $_SESSION["score"] = $row['student_point']; 
    $_SESSION["vocation"] = $row['vocation'];
    $_SESSION["room"] = $row['room'];
    $_SESSION["major"] = $row['major'];

    if ($status == '0') { /* ถ้าสถานะเป็น 0 คือ user ให้ไปที่หน้า dashboard */
        header("location:dashboard.php");
        exit(); 
    } elseif ($status == '1') { /* แต่ถ้าเป็น 1 คือ admin ให้ไปที่หน้า index */
        header("location:index.php");
        exit(); 
    }
} else { /* เมื่อข้อมูลไม่ตรงกับในฐานข้อมูล */
    $_SESSION["Error"] = "อีเมลหรือรหัสผ่านผิดพลาด";
    header("location:login.php");
    exit();
}
?>