<?php
include "condb.php";

$name = $_POST['name'];
$major = $_POST['major'];

$sql = "INSERT INTO students_list(name, major) VALUES('$name','$major')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<body><script>
        Swal.fire({
            title: 'บันทึกสำเร็จ!',
            text: 'ข้อมูลถูกบันทึกเรียบร้อยแล้ว',
            icon: 'success',
            confirmButtonText: 'ตกลง'
        }).then(() => {
            window.location = '../frontend/add_student.php';
        });
    </script></body>";
} else {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<body><script>
        Swal.fire({
            title: 'เกิดข้อผิดพลาด!',
            text: 'ไม่สามารถบันทึกข้อมูลได้',
            icon: 'error',
            confirmButtonText: 'ลองอีกครั้ง'
        }).then(() => {
            window.location = '../frontend/add_student.php?do=fail';
        });
    </script></body>";
}
?>
