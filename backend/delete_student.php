<?php
    include "condb.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM students_list WHERE student_id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                title: 'ลบข้อมูลสำเร็จ!',
                text: 'ข้อมูลถูกลบเรียบร้อยแล้ว',
                icon: 'success',
                confirmButtonText: 'ตกลง'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = '../frontend/index.php'; // เปลี่ยนเส้นทางกลับไปยังหน้าแรก
                }
            });
        </script>
        ";
    }else{
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                title: 'ลบข้อมูลล้มเหลว!',
                text: 'เกิดข้อผิดพลาดในการลบข้อมูล',
                icon: 'error',
                confirmButtonText: 'ลองอีกครั้ง'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = '../frontend/index.php'; // เปลี่ยนเส้นทางกลับไปยังหน้าแรก
                }
            });
        </script>
        ";
    }
?>    