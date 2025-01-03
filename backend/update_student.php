<?php
    include "condb.php";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $major = $_POST['major'];
    $sql = "UPDATE students_list SET name='$name', major='$major' WHERE student_id='$id'";
    $result = mysqli_query($conn,$sql);
    
    if ($result) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<body><script>
            Swal.fire({
                title: 'แก้ไขสำเร็จ!',
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
                text: 'ไม่สามารถแก้ไข้ข้อมูลได้',
                icon: 'error',
                confirmButtonText: 'ลองอีกครั้ง'
            }).then(() => {
                window.location = '../frontend/edit_student.php';
            });
        </script></body>";
    }
    ?>
    