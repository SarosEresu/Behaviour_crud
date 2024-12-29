<?php
    include "condb.php";
    $id = $_POST['id'];
    $des = $_POST['description'];
    $score = $_POST['score'];

    $sql = "INSERT INTO behaviour_log(student_id, log_des, point) VALUES('$id','$des','$score');
            UPDATE students_list SET student_point = student_point + '$score' WHERE student_id = '$id';";

    $result = mysqli_multi_query($conn,$sql);
    if($result){
        echo "<script>alert('เพิ่มข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='../frontend/index.php';</script>";
    }else{
         echo "<script>alert('แก้ไขข้อมูลล้มเหลว');</script>";
         echo "<script>window.location='../frontend/index.php';</script>";
    }


?>