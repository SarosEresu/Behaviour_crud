<!-- หน้าสำหรับ สั่งการ การเพิ่มนักเรียน  -->
<?php
include "condb.php"; /* เชื่อมฐานข้อมูล */

$id = $_POST['student_id']; /* รับข้อมูลที่ส่งมา */
$name = $_POST['name'];
$vocation = $_POST['vocation'];
$room = $_POST['room'];
$major = $_POST['major'];
$email = $_POST['email'];
$password = $_POST['password'];

// ตรวจสอบว่าข้อมูล ซ้ำหรือไม่
$check_sql = "SELECT * FROM students_list WHERE student_id = '$id' OR email = '$email'";
$check_result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
    // ถ้าพบข้อมูลที่ซ้ำ
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <body><script>
        Swal.fire({
            title: 'ลงทะเบียนล้มเหลว!',
            text: 'รหัสนักศึกษาหรืออีเมลนี้มีอยู่ในระบบแล้ว',
            icon: 'error',
            confirmButtonText: 'กลับหน้าแรก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = 'index.php'; // กลับไปยังหน้าลงทะเบียน
            }
        });
    </script></body>
    ";
} else {
    // ถ้าไม่พบข้อมูลที่ซ้ำ ทำการลงทะเบียน
    $sql = "INSERT INTO students_list (student_id, name, vocation, room, major, email, password) 
            VALUES ('$id', '$name', '$vocation', '$room', '$major', '$email', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <body><script>
            Swal.fire({
                title: 'ลงทะเบียนสำเร็จ!',
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
                    window.location = 'index.php'; // กลับไปยังหน้าลงทะเบียน
                }
            });
        </script></body>
        ";
    }
}

mysqli_close($conn);
?>