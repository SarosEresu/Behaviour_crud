<?php
    include "condb.php";
    $id = $_GET['id'];
    $sid = $_GET['sid'];
    $point = $_GET['point'];

    $sql = "DELETE FROM behaviour_log WHERE log_id = '$id';
            UPDATE students_list SET student_point = student_point - '$point' WHERE student_id = '$sid';";
    $result = mysqli_multi_query($conn,$sql);

    if($result){
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <body><script>
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
        </script></body>
        ";
    }else{
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
         <body><script>
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
        </script></body>
        ";
    }
?>