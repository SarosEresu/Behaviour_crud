<?php
    include "condb.php"; // ดึงไฟล์ที่ใช้เชื่อมฐานข้อมูล


    $id = $_GET['id']; 
    $sid = $_GET['sid'];     /* รับข้อมูลที่ส่งมาจาก Frontend มาเก็บไว้ในตัวแปร*/
    $point = $_GET['point'];

    $sql = "DELETE FROM behaviour_log WHERE log_id = '$id';
            UPDATE students_list SET student_point = student_point - '$point' WHERE student_id = '$sid';";  /* ภาษา sql ใช้สำหรับสั่งคำสั่งที่เราต้องการจะกระทำต่อฐานข้อมูล */
    $result = mysqli_multi_query($conn,$sql); /* สั่งให้คำสั่ง sql ทำงาน */

    //ใช้ if else ในการตรวจสอบการทำงาน
    if($result){ //ในกรณีที่สามารถทำงานได้ตามปกติให้sweetalertทำงานตามนี้
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
    }else{ //ในกรณีที่ "ไม่" สามารถทำงานได้ตามปกติให้sweetalertทำงานตามนี้
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