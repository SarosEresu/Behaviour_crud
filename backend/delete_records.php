<?php
    include "condb.php";
    $id = $_GET['id'];
    $sid = $_GET['sid'];
    $point = $_GET['point'];

    $sql = "DELETE FROM behaviour_log WHERE log_id = '$id';
            UPDATE students_list SET student_point = student_point - '$point' WHERE student_id = '$sid';";
    $result = mysqli_multi_query($conn,$sql);

    if($result){
        echo "<script>alert('ลบข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='../frontend/index.php';</script>";
    }else{
        echo "<script>alert('ลบข้อมูลล้มเหลว');</script>";
        echo "<script>window.location='../frontend/index.php';</script>";
    }
?>