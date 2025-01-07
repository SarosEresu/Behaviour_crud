<?php
include "condb.php"; // ดึงไฟล์ที่ใช้เชื่อมฐานข้อมูล

$name = $_POST['name'];     /* รับข้อมูลที่ส่งมาจาก Frontend มาเก็บไว้ในตัวแปร*/
$major = $_POST['major']; 

$sql = "INSERT INTO students_list(name, major) VALUES('$name','$major')"; /* ภาษา sql ใช้สำหรับสั่งคำสั่งที่เราต้องการจะกระทำต่อฐานข้อมูล */
$result = mysqli_query($conn, $sql); /* สั่งให้คำสั่ง sql ทำงาน */

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
            window.location = '../frontend/index.php';
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
            window.location = '../frontend/add_student.php';
        });
    </script></body>";
}
?>
