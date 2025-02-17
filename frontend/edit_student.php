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
        <label>รหัสประจำตัวนักศึกษา:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="id" value="<?=$row['student_id']?>" required > <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <label>ชื่อ-นามสกุล:</label>
        <input class="form-control form-control-lg mb-3  w-25" type="text" name="name" value="<?=$row['name']?>"  required > <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <label>ลำดับชั้น:</label>
        <select class="form-select  h-100 w-25 mb-3" aria-label="Default select example" name="vocation" required> <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <option value="ปวช.1" <?php if ($row['vocation'] == "ปวช.1") echo 'selected'; ?>>ปวช.1</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="ปวช.2" <?php if ($row['vocation'] == "ปวช.2") echo 'selected'; ?>>ปวช.2</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="ปวช.3" <?php if ($row['vocation'] == "ปวช.3") echo 'selected'; ?>>ปวช.3</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="ปวช.1/Wil" <?php if ($row['vocation'] == "ปวช.1/Wil") echo 'selected'; ?>>ปวช.1/Wil</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="ปวช.2/Wil" <?php if ($row['vocation'] == "ปวช.2/Wil") echo 'selected'; ?>>ปวช.2/Wil</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="ปวช.3/Wil" <?php if ($row['vocation'] == "ปวช.3/Wil") echo 'selected'; ?>>ปวช.3/Wil</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="ปวส.1"   <?php if ($row['vocation'] == "ปวส.1") echo 'selected'; ?>>ปวส.1</option>
        <option value="ปวส.2"   <?php if ($row['vocation'] == "ปวส.2") echo 'selected'; ?>>ปวส.2</option>
        <option value="ปวส.1/Wil"   <?php if ($row['vocation'] == "ปวส.1/Wil") echo 'selected'; ?>>ปวส.1/Wil</option>
        <option value="ปวส.2/Wil"   <?php if ($row['vocation'] == "ปวส.2/Wil") echo 'selected'; ?>>ปวส.2/Wil</option>
        </select>
        <label>สาขาวิชา:</label>
        <select class="form-select  h-100 w-25 mb-3" aria-label="Default select example" name="major" required> <!-- นำข้อมูลจากฐานข้อมูลออกมาแสดง -->
        <option value="แผนกวิชาเทคนิคพื้นฐาน" <?php if ($row['major'] == "แผนกวิชาเทคนิคพื้นฐาน") echo 'selected'; ?>>แผนกวิชาเทคนิคพื้นฐาน</option> <!-- ส่งค่าข้อมูลมาเป็นสาขางานใหน ให้แสดงผลสาขางานนั้นเป็นอันแรก -->
        <option value="แผนกวิชาช่างยนต์"   <?php if ($row['major'] == "แผนกวิชาช่างยนต์") echo 'selected'; ?>>แผนกวิชาช่างยนต์</option>
        <option value="แผนกวิชาช่างกลโรงงาน" <?php if ($row['major'] == "แผนกวิชาช่างกลโรงงาน") echo 'selected'; ?>>แผนกวิชาช่างกลโรงงาน</option>
        <option value="แผนกวิชาช่างไฟฟ้ากําลัง" <?php if ($row['major'] == "แผนกวิชาช่างไฟฟ้ากําลัง") echo 'selected'; ?>>แผนกวิชาช่างไฟฟ้ากําลัง</option>
        <option value="แผนกวิชาเทคนิคคอมพิวเตอร์" <?php if ($row['major'] == "แผนกวิชาเทคนิคคอมพิวเตอร์") echo 'selected'; ?>>แผนกวิชาเทคนิคคอมพิวเตอร์</option>
        <option value="แผนกการบัญชี" <?php if ($row['major'] == "แผนกการบัญชี") echo 'selected'; ?>>แผนกการบัญชี</option>
        <option value="แผนกวิชาการตลาด" <?php if ($row['major'] == "แผนกวิชาการตลาด") echo 'selected'; ?>>แผนกวิชาการตลาด</option>
        <option value="แผนกวิชาการโรงแรม" <?php if ($row['major'] == "แผนกวิชาการโรงแรม") echo 'selected'; ?>>แผนกวิชาการโรงแรม</option>
        <option value="แผนกวิชาการอาหารและโภชนาการ" <?php if ($row['major'] == "แผนกวิชาการอาหารและโภชนาการ") echo 'selected'; ?>>แผนกวิชาการอาหารและโภชนาการ</option>
        <option value="แผนกวิชาเทคโนโลยีสารสนเทศ" <?php if ($row['major'] == "แผนกวิชาเทคโนโลยีสารสนเทศ") echo 'selected'; ?>>แผนกวิชาเทคโนโลยีสารสนเทศ</option>
        <option value="แผนกวิชาหลักสูตรระยะสั้น" <?php if ($row['major'] == "แผนกวิชาหลักสูตรระยะสั้น") echo 'selected'; ?>>แผนกวิชาหลักสูตรระยะสั้น</option>
        </select>
        <input type="submit" class="btn btn-success" value="ยืนยันการแก้ไข">
        <a href="index.php" class="btn btn-secondary">กลับ</a>
        </form>
</div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>