<?php
    include "condb.php";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $major = $_POST['major'];
    $sql = "UPDATE students_list SET name='$name', major='$major' WHERE student_id='$id'";
    $result = mysqli_query($conn,$sql);
    
    if($result){
        echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='../frontend/index.php';</script>";
    }else{
         echo "<script>alert('แก้ไขข้อมูลล้มเหลว');</script>";
         echo "<script>window.location='../frontend/add_student.php';</script>";
    }

?> 