<!-- หน้าสำหรับ แก้ไขข้อมูลในฐานข้อมูล  -->
<?php
    include "condb.php"; // ดึงไฟล์ที่ใช้เชื่อมฐานข้อมูล


    $id = $_POST['id'];
    $name = $_POST['name'];    /* รับข้อมูลที่ส่งมาจาก Frontend มาเก็บไว้ในตัวแปร*/
    $room = $_POST['room'];
    $vocation = $_POST['vocation'];
    $major = $_POST['major'];
    $email = $_POST['email'];
    $password = $_POST['password'];



    $sql = "UPDATE students_list SET name='$name',room='$room', major='$major' , vocation='$vocation', email='$email', password='$password' WHERE student_id='$id'"; /* ภาษา sql ใช้สำหรับสั่งคำสั่งที่เราต้องการจะกระทำต่อฐานข้อมูล */
    $result = mysqli_query($conn,$sql); /* สั่งให้คำสั่ง sql ทำงาน */
    
    //ใช้ if else ในการตรวจสอบการทำงาน
    if ($result) { //ในกรณีที่สามารถทำงานได้ตามปกติให้sweetalertทำงานตามนี้
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<body><script>
            Swal.fire({
                title: 'แก้ไขสำเร็จ!',
                text: 'ข้อมูลถูกแก้ไขเรียบร้อยแล้ว',
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
                text: 'ไม่สามารถแก้ไข้ข้อมูลได้',
                icon: 'error',
                confirmButtonText: 'ลองอีกครั้ง'
            }).then(() => {
                window.location = 'edit_student.php';
            });
        </script></body>";
    }
    ?>
    