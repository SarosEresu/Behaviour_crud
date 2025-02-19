<!-- หน้าสำหรับ สั่งการเพิ่มข้อมูลความประพฤติ  -->
<?php
    include "condb.php"; // ดึงไฟล์ที่ใช้เชื่อมฐานข้อมูล


    $id = $_POST['id'];
    $des = $_POST['description']; /* รับข้อมูลที่ส่งมาจาก Frontend มาเก็บไว้ในตัวแปร*/
    $score = $_POST['score'];

    $sql = "INSERT INTO behaviour_log(student_id, log_des, point) VALUES('$id','$des','$score');
            UPDATE students_list SET student_point = student_point + '$score' WHERE student_id = '$id';"; /* ภาษา sql ใช้สำหรับสั่งคำสั่งที่เราต้องการจะกระทำต่อฐานข้อมูล */ 
    $result = mysqli_multi_query($conn,$sql); /* สั่งให้คำสั่ง sql ทำงาน */

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
                window.location = 'index.php';
            });
        </script></body>";
    }
?>