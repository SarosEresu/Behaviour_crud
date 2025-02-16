<?php
    include "../backend/condb.php"; //เชื่อมฐานข้อมูล
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
        <div class="alert alert-success p-3" role="alert">
            เพิ่มข้อมูลนักเรียน
        </div>

        <!-- แบบฟอร์มสำหรับกรอกข้อมูลที่ต้องการจะเพิ่มไปที่ฐานข้อมูล-->
        <form method="POST" action="../backend/insert_student.php"> <!-- ระบุว่าต้องการส่งข้อมูลไปที่ไฟล์ใหน เพื่อทำการจัดการกับฐานข้อมูลต่อไป-->
        <label>ชื่อ:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" placeholder="กรอกชื่อ...."  required>
        <label>สาขาวิชา:</label>
        <select class="form-select  h-100 w-25 mb-3" aria-label="Default select example" name="major" required>
        <option value="">-Choose-</option>
        <option value="Information Technology">Information Technology</option>
        <option value="Computer Engineering">Computer Engineering</option>
        <option value="Mechanical Engineering">Mechanical Engineering</option>
        <option value="Industrial Engineering">Industrial Engineering</option>
        <input type="submit" class="btn btn-success">
        <a href="index.php" class="btn btn-secondary">กลับ</a>
        </select>
        </form>
    </div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>