<?php
    include "condb.php"; //เชื่อมฐานข้อมูล
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลนักเรียน</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> <!-- ดึง bootstrap มาใช้งาน -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- ดึง sweetlalert มาใช้งาน -->
</head>
<body>
<div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-6">


        <div class="alert alert-success h4" role="alert">
        เพิ่มข้อมูลนักเรียน
        </div>
        <br>
        <form method="POST" action="insert_student.php" >
        <label for="">รหัสนักศึกษา</label>
        <input type="number" name="student_id" class="form-control" required> <br>
        <label for="">ชื่อ-นามสกุล</label>
        <input type="text" name="name" class="form-control" required> <br>
        <label for="">ระดับชั้น</label>
        <select class="form-select  h-100 w-25 mb-3" aria-label="Default select example" name="vocation" required>  <br><!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <option value="ปวช.1">ปวช.1</option> 
        <option value="ปวช.2">ปวช.2</option> 
        <option value="ปวช.3">ปวช.3</option>
        <option value="ปวช.1/wil">ปวช.1/wil</option> 
        <option value="ปวช.2/wil">ปวช.2/wil</option> 
        <option value="ปวช.3/wil">ปวช.3/wil</option>  
        <option value="ปวส.1">ปวส.1</option>  
        <option value="ปวส.2">ปวส.2</option>  
        <option value="ปวส.1/wil">ปวส.1/wil</option>  
        <option value="ปวส.2/wil">ปวส.2/wil</option>
        </select>
        <label for="">ห้อง</label>
        <select class="form-select  h-100 w-25 mb-3" aria-label="Default select example" name="room" required>  <br><!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <option value="1">1</option> 
        <option value="2">2</option> 
        <option value="3">3</option>
        <option value="4">4</option> 
        <option value="5">5</option> 
        </select>
        <label>สาขาวิชา:</label>
        <select class="form-select  h-100 w-30 mb-3" aria-label="Default select example" name="major" required> <br> <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <option value="แผนกวิชาเทคนิคพื้นฐาน">แผนกวิชาเทคนิคพื้นฐาน</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="แผนกวิชาช่างยนต์">แผนกวิชาช่างยนต์</option>
        <option value="แผนกวิชาช่างกลโรงงาน" >แผนกวิชาช่างกลโรงงาน</option>
        <option value="แผนกวิชาช่างไฟฟ้ากําลัง">แผนกวิชาช่างไฟฟ้ากําลัง</option>
        <option value="แผนกวิชาเทคนิคคอมพิวเตอร์">แผนกวิชาเทคนิคคอมพิวเตอร์</option>
        <option value="แผนกการบัญชี">แผนกการบัญชี</option>
        <option value="แผนกวิชาการตลาด">แผนกวิชาการตลาด</option>
        <option value="แผนกวิชาการโรงแรม">แผนกวิชาการโรงแรม</option>
        <option value="แผนกวิชาการอาหารและโภชนาการ">แผนกวิชาการอาหารและโภชนาการ</option>
        <option value="แผนกวิชาเทคโนโลยีสารสนเทศ">แผนกวิชาเทคโนโลยีสารสนเทศ</option>
        <option value="แผนกวิชาหลักสูตรระยะสั้น">แผนกวิชาหลักสูตรระยะสั้น</option>
        </select>
        <label for="">อีเมล</label>
        <input type="email" name="email" class="form-control w-26" required> <br>
        <label for="">รหัสผ่าน</label>
        <input type="password" name="password" class="form-control w-26" required> <br>
        <div class="mt-2"> 
        <input type="submit" name="submit" value="บันทึก" class="btn btn-primary">
        <a href="index.php" class="btn btn-warning">กลับ</a>    
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>