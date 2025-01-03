<?php
    include "condb.php";
    $id = $_POST['id'];
    $des = $_POST['description'];
    $score = $_POST['score'];

    $sql = "INSERT INTO behaviour_log(student_id, log_des, point) VALUES('$id','$des','$score');
            UPDATE students_list SET student_point = student_point + '$score' WHERE student_id = '$id';";

    $result = mysqli_multi_query($conn,$sql);
    if ($result) {
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
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<body><script>
            Swal.fire({
                title: 'เกิดข้อผิดพลาด!',
                text: 'ไม่สามารถบันทึกข้อมูลได้',
                icon: 'error',
                confirmButtonText: 'ลองอีกครั้ง'
            }).then(() => {
                window.location = '../frontend/index.php';
            });
        </script></body>";
    }
?>