<!-- หน้าสำหรับ สั่งการการเพิ่ม admin  -->
<?php
include "condb.php"; /* เชื่อมฐานข้อมูล */

$tel = $_POST['tel']; /* รับข้อมูลที่ส่งมา */
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];




$check_sql = "SELECT * FROM students_list WHERE name = '$name' OR email = '$email'"; /* โค๊ดภาษา sql */
$check_result = mysqli_query($conn, $check_sql); /* สั่งใช้งานโค๊ด sql */

if (mysqli_num_rows($check_result) > 0) {
    // ถ้าพบข้อมูลที่ซ้ำ
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <body><script>
        Swal.fire({
            title: 'ลงทะเบียนล้มเหลว!',
            text: 'รหัสนักศึกษาหรืออีเมลนี้มีอยู่ในระบบแล้ว',
            icon: 'error',
            confirmButtonText: 'ลองอีกครั้ง'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = 'register_am.php'; // กลับไปยังหน้าลงทะเบียน
            }
        });
    </script></body>
    ";
} else {
    // ถ้าไม่พบข้อมูลที่ซ้ำ ทำการลงทะเบียน
    $sql = "INSERT INTO students_list ( student_id, name, email, password, status) 
            VALUES ('$tel','$name', '$email', '$password', '1')";
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
                    window.location = 'register_am.php'; // กลับไปยังหน้าลงทะเบียน
                }
            });
        </script></body>
        ";
    }
}

mysqli_close($conn);
?>