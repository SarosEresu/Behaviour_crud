<?php
    include "../backend/condb.php"; //เชื่อมฐานข้อมูล
    $id = $_GET['id']; //ดึงไอดีของข้อมูลที่ต้องการจะแก้ที่ส่งกับURLมาเก็บไว้ในตัวแปร
    $sql ="SELECT * FROM students_list WHERE student_id = '$id'"; //ระบุการกระทำที่จะทำกับฐานข้อมูล

    $result = mysqli_query($conn,$sql); //สั่งใช้งานคำสั่งที่จะกระทำกับฐานข้อมูล
    $row = mysqli_fetch_array($result); //นำคำสั่งที่จะกระทำกับฐานข้อมูลมาแปลงให้้เป็นแถว
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <div class="alert alert-success p-3" role="alert">
            แก้ไขข้อมูลนักเรียน
        </div>

        <!-- แบบฟอร์มสำหรับกรอกข้อมูลที่ต้องการจะแก้ไขไปที่ฐานข้อมูล-->
        <form method="POST" action="../backend/update_student.php"> <!-- ระบุว่าต้องการส่งข้อมูลไปที่ไฟล์ใหน เพื่อทำการจัดการกับฐานข้อมูลต่อไป-->
        <label>ไอดี:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="id" value="<?=$row['student_id']?>" readonly > <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <label>ชื่อ:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" value="<?=$row['name']?>"  required > <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <label>สาขาวิชา:</label>
        <select class="form-select  h-100 w-25 mb-3" aria-label="Default select example" name="major" required> <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <option value="">-Choose-</option>
        <option value="Information Technology" <?php if ($row['major'] == "Information Technology") echo 'selected'; ?>>Information Technology</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="Computer Engineering"   <?php if ($row['major'] == "Computer Engineering") echo 'selected'; ?>>Computer Engineering</option>
        <option value="Mechanical Engineering" <?php if ($row['major'] == "Mechanical Engineering") echo 'selected'; ?>>Mechanical Engineering</option>
        <option value="Industrial Engineering" <?php if ($row['major'] == "Industrial Engineering") echo 'selected'; ?>>Industrial Engineering</option>

        <input type="submit" class="btn btn-success">
        <a href="index.php" class="btn btn-secondary">กลับ</a>
        </select>
        </form>
    </div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>